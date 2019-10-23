<?php

namespace Tjventurini\VoyagerShop\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Tjventurini\VoyagerShop\Models\Order;
use Illuminate\Contracts\Queue\ShouldQueue;
use Tjventurini\VoyagerShop\Models\Payment;

class OrderReceived extends Mailable
{
    use Queueable, SerializesModels;

    public $Payment;
    public $Order;
    public $ProductVariant;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Payment $Payment)
    {
        $this->Payment = $Payment;
        $this->Order = $Payment->order;
        $this->ProductVariant = $Payment->productVariant;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(config('voyager-shop.mail.from'), config('voyager-shop.mail.name'))
                ->markdown('shop::mail.order_received')
                ->text('shop::mail.order_received_plain');
    }
}
