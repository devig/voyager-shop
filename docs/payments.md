# Payments

This package uses [Stripe](http://stripe.com) to handle payments. Please read through this section carefully so you know what happens behind the scenes.

This package depends on [Laravel Cashier](https://laravel.com/docs/cashier) to handle payments. Please read through their documentation so you have a better understanding of how this package works.

This package also uses [Stripe-Webhooks](https://github.com/spatie/laravel-stripe-webhooks) to handle the webhooks from stripe. Please read through their documentation so you have a better understanding of how this package handles webhooks.

## Setup

To let users make payments, you will need to have the used currencies in the database. You can set them up through the admin panel.

To verify webhooks, you will need to set the `STRIPE_WEBHOOK_SECRET` environment variable in your `.env` file. You can get your webhook secret from your stripe dashboard in the webhooks setup.

## StripeService

The stripe service class of this package is where the payments are created. For each charged amount, a payment is saved to the database. You can access these entries through the `Payment` model of this package.

## Webhooks

To keep track of the payments made, this package uses stripes webhooks. The webhooks call the `/stripe/webhooks` URL to inform the application about state changes of the payments. This package uses [Stripe-Webhooks](https://github.com/spatie/laravel-stripe-webhooks) package to handle these calls.

You will need to setup a webhook in the stripe dashboard. The URL to use will be something like `https://example.com/stripe/webhooks`.

After installing the package, there will be only one job listening to the webhooks available. The webhook listens to the `payment_intent.succeeded` webhook sent to the application. The sample job that listens to this event, will update the state of the payment and send success emails to the project administrator and the customer. Take a look at the `HandlePaymentIntentSucceeded` class if you want to know more about handling these events. You can add more events using the `stripe-webhooks` configuration.