<?php

namespace Tjventurini\VoyagerShop\Jobs\StripeWebhooks;

use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Tjventurini\VoyagerShop\Models\Payment;
use Spatie\WebhookClient\Models\WebhookCall;
use Tjventurini\VoyagerShop\Mail\OrderReceived;
use Tjventurini\VoyagerShop\Mail\PaymentReceived;

class HandlePaymentIntent implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    /** @var \Spatie\WebhookClient\Models\WebhookCall */
    public $webhookCall;

    public function __construct(WebhookCall $webhookCall)
    {
        $this->webhookCall = $webhookCall;
    }

    public function handle()
    {
        // get data from payload
        $payment_intent = $this->webhookCall->payload['data']['object'];

        // get payment from database by stripe_id
        $Payment = Payment::where('stripe_id', $payment_intent['id'])->firstOrFail();

        // update state
        $Payment->update([
            'state' => $payment_intent['status']
        ]);

        // send mail to shop administrators
        foreach ($Payment->project->users()->where('role_id', 1)->get() as $User) {
            Mail::to($User->email, $User->name)->send(new PaymentReceived($Payment));
        }

        // send mail to user
        Mail::to($User->email, $User->name)->send(new OrderReceived($Payment));
    }
}
