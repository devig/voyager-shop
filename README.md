# Voyager Shop

This package provides a graphql shop that can be managed through the [voyager admin panel](https://laravelvoyager.com/).

# Installation

Just run the following command.

```bash
php artisan voyager-shop:install
```

Update the used traits on the `User` Model.

```php
<?php

namespace App;

use Laravel\Cashier\Billable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Tjventurini\VoyagerProjects\Traits\HasProjects;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tjventurini\VoyagerShop\Traits\Relationships\HasOrders;
use Tjventurini\VoyagerShop\Traits\Relationships\HasManyCards;
use Tjventurini\VoyagerShop\Traits\Relationships\HasManyAddresses;

class User extends \TCG\Voyager\Models\User
{
    use HasApiTokens, Notifiable, HasOrders, HasProjects, HasManyCards, HasManyAddresses, Billable;

    ...
```

Add stripe keys to the `.env` file.

```
STRIPE_KEY=your-public-key
STRIPE_SECRET=your-secret-key
```

If you don't use USD as your default currency you should add set the your default currency in the `.env` file.

```
CASHIER_CURRENCY=eur
```


For more information about the payment implementation check out the [Laravel Cashier Documentation](https://laravel.com/docs/billing).

To setup the stripe webhooks you need to set your `STRIPE_WEBHOOK_SECRET` in the `.env` file aswell.

```
STRIPE_WEBHOOK_SECRET=your-webhook-secret
```

For more information about the webhooks implementation check out the [spatie/laravel-stripe-webhooks](https://github.com/spatie/laravel-stripe-webhooks) package documentation on github.

## Frontend Example

Here is a sample implementation of the stripe.js framework to get a payment method.

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Stripe Sample</title>

    <style>
        .checkout-form {
            width: 500px;
            margin: auto;
        }
        .checkout-form input {
            width: 100%;
        }
        .checkout-form button {
            float: right;
        }
    </style>
</head>
<body>

    <div class="checkout-form">
        <h1>Charge $ 10</h1>
        <p>Stripe sample for one time payments.</p>

        <input id="card-holder-name" type="text" placeholder="Name auf der Karte">

        <!-- Stripe Elements Placeholder -->
        <div id="card-element"></div>

        <button id="card-button">
            Process Payment
        </button>
    </div>

    <script src="https://js.stripe.com/v3/"></script>

    <script>
        const stripe = Stripe('{{ config("services.stripe.key") }}');

        const elements = stripe.elements({locale: 'de', country: 'AT'});
        const cardElement = elements.create('card');

        cardElement.mount('#card-element');

        const cardHolderName = document.getElementById('card-holder-name');
        const cardButton = document.getElementById('card-button');

        cardButton.addEventListener('click', async (e) => {
            const { paymentMethod, error } = await stripe.createPaymentMethod(
                'card', cardElement, {
                    billing_details: { name: cardHolderName.value }
                }
            );

            if (error) {
                alert('error');
                console.log(error);
            } else {
                alert('works');
                console.log(paymentMethod);
            }
        });
    </script>

</body>
</html>
```