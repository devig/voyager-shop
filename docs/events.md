# Events

In this package you have a lot of events that enable you to interact with it's logic. In this section you will find a list of the available events so you know where you can inject your own custom logic.

The events listed are fired in the service classes of this package. So they will only be fired if they come into play, like when using the graphql api.

Please take a look at the Services and the Events them selves to get a better understanding of them.

|          Event          | Attributes                                       | Description                                                                                                                              |
|:-----------------------:|:-------------------------------------------------|:-----------------------------------------------------------------------------------------------------------------------------------------|
|       `AddToCart`       | `&Order`, `&OrderItem`                           | Is fired after the `OrderItem` was created or updated.                                                                                   |
|      `ChargeUser`       | `&User`,`&description`, `&Payment`               | Is fired after the `User` was charged.                                                                                                   |
|      `CreateCart`       | `&Order`                                         | Is fired after a new `Order` is created.                                                                                                 |
|     `DeleteAddress`     | `&Address`                                       | Is fired just before the address gets deleted.                                                                                           |
|      `DeleteCard`       | `&Card`                                          | Is fired just before the card gets deleted.                                                                                              |
|       `OrderCart`       | `&Order`, `&OrderItem`, `&price`, `&description` | Is fired just before the `User` gets charged for an `Order`.                                                                             |
|     `OrderProduct`      | `&Order`, `&OrderItem`, `&price`, `&description` | Is fired just before the `User` gets charged for an `ProductVariant`.                                                                    |
|    `RemoveFromCart`     | `&Order`, `&OrderItem`                           | Is fired just before an `OrderItem` gets deleted.                                                                                        |
|  `RemovePaymentMethod`  | `&paymentMethod`                                 | Is fired just after the payment method was deleted from the database and stripe. The paymentMethod in this case is the stripe_id string. |
|       `SaveCard`        | `&Card`                                          | Is fired after the `Card` model has been saved.                                                                                          |
|   `SavePaymentMethod`   | `$Card`                                          | Is fired just after the payment method was saved successfully.                                                                           |
|   `SetBillingAddress`   | `&billing_address`                               | Is fired before the `Address` model gets created.                                                                                        |
|  `SetShippingAddress`   | `&shipping_address`                              | Is fired before the `Address` model gets created.                                                                                        |
|      `UpdateCart`       | `&Order`, `&OrderItem`, `&data`                  | Is fired before the `OrderItem` gets updated.                                                                                            |
| `UpdateOrCreateAddress` | `&User`, `&Project`, `&Country`, `&address`      | Is fired before the `Address` model gets updated or created.                                                                             |

## Listen to Events

Please read about events in the [laravel documentation](https://laravel.com/docs).