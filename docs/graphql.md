# GraphQL

The package exposes a graphql endpoint using [lighthouse-php](https://lighthouse-php.com) package. In this part of the documentation we will describe all queries and mutations that you can use.

## Setup

The package publishes a graphql schema that you need to include into your own. This part will not be done by the `php artisan voyager-shop:install` command.

Open your `graphql/schema.grpahql` file and add the following line to it.

```
...

#import shop.graphql
```

Now the shop grpahql schema will be included in the general graphql schema exposed by the [lighthouse-php](https://lighthouse-php.com) package.

## Types

In this section of the documentation you will find all types exposed by the shop graphql schema of this package.

|      Type      | Description                                                 |
|:--------------:|:------------------------------------------------------------|
|    Payment     | The payment returned by the `charge` and `order` mutations. |
|      Card      | A payment method that was saved before.                     |
|    Product     | A representation of a `Product` model.                      |
| ProductVariant | A representation of a `ProductVariant` model.               |
|    Country     | A representation of a `Country` model.                      |
|      Tax       | A representation of a `Tax` model.                          |
|    Currency    | A representation of a `Currency` model.                     |
|     Order      | A representation of a `Order` model.                        |
|   OrderItem    | A representation of a `OrderItem` model.                    |
|    Address     | A representation of a `Address` model.                      |
|      User      | A representation of a `User` model.                         |
|    Project     | A representation of a `Project` model.                      |
|      Tag       | A representation of a `Tag` model.                          |

## Queries

In this section of the documentation you will find all queries exposed by the shop graphql schema of this package.

|   Query    | Parameters       | Returns        | Description                                          |
|:----------:|:-----------------|:---------------|:-----------------------------------------------------|
|  `products`  | -                | `[Product!]!`  | Query all products available in the current project. |
|  `product`   | `slug: String!`  | `Product!`     | Query a specific product by slug.                    |
| `countries`  | -                | `[Country!]!`  | Query all available countries in this project.       |
|  `country`   | `code: String!`  | `Country!`     | Query a specific country by code.                    |
|   `taxes`    | -                | `[Tax!]!`      | Query all available taxes in this project.           |
|    `tax`     | `id: String!`    | `Tax!`         | Query a specific tax by id.                          |
| `currencies` | -                | `[Currency!]!` | Query all available currencies in this project.      |
|  `currency`  | `code: String!`  | `Currency!`    | Query a specific currency by code.                   |
|    `cart`    | `token: String!` | `Order!`       | Query a specific cart by token.                      |
|   `orders`   | -                | `[Order!]!`    | Query all available orders of the logged in user.    |
|   `cards`    | -                | `[Card!]!`     | Query all available cards of the logged in user.     |

## Mutations

In this section of the documentation you will find all mutations exposed by the shop graphql schema of this package.

|        Mutation         | Parameters                                                                          | Returns       | Description                                                                                                                                                                                                                                                               |
|:-----------------------:|:------------------------------------------------------------------------------------|:--------------|:--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
|      `createCart`       | -                                                                                   | `Order!`      | Creates an order and returns it. Use the token to work on the current order.                                                                                                                                                                                              |
|       `addToCart`       | `token: String!, item: ID!, quantity: Int`                                          | `Order!`      | Add a product to the cart. You send an `Order` token and the id of the `ProductVariant` that you want to ad to the cart. The default quantity is 1. If you send a quantity with it and the product is already in the cart, the quantity will be added to the current one. |
|    `removeFromCart`     | `token: String! item: ID!`                                                          | `Order!`      | Remove a product from the cart. You send an `Order` token and the id of the `ProductVariant` that you want to remove from the cart.                                                                                                                                       |
|      `updateCart`       | `token: String! item: ID! quantity: Int!`                                           | `Order!`      | Update a given item in the cart. You send an `Order` token, the id of a given `ProductVariant` and the new `quantity`.                                                                                                                                                    |
|   `savePaymentMethod`   | `stripe_id: String!, brand: String!, last_four: String!, name: String`              | `Card!`       | Add a new `PaymentMethod` as `Card` model to the database and stripe.                                                                                                                                                                                                     |
|  `removePaymentMethod`  | `stripe_id: String!`                                                                | `[Card!]!`    | Remove a payment method by `strype_id` from the database and from stripe.                                                                                                                                                                                                 |
|        `charge`         | `description: String! amount: Int! stripe_id: String currency: String`              | `Payment!`    | Charge a `User` for a given amount. You send a `description`, an `amount`, the `stripe_id` of a `PaymentMethod` and the currency code of the selected `Currency`.                                                                                                         |
|         `order`         | `token: String item: ID stripe_id: String currency: String`                         | `Payment!`    | This mutation lets you either buy an `Order` by token or a `ProductVariant` by id.                                                                                                                                                                                        |
|   `setBillingAddress`   | `token: String! id: ID name: String! street: String! zip: String! country: String!` | `Order!`      | Set the billing `Address` for a given `Order`.                                                                                                                                                                                                                            |
|  `setShippingAddress`   | `token: String! id: ID name: String! street: String! zip: String! country: String!` | `Order!`      | Set the shipping `Address` for a given `Order`.                                                                                                                                                                                                                           |
| `updateOrCreateAddress` | `name: String! street: String! zip: String! country: String!`                       | `Address!`    | Manage the `Address` of the current `User`.                                                                                                                                                                                                                               |
|     `deleteAddress`     | `id: ID!`                                                                           | `[Address!]!` | Delete a given `Address` from the `User`.                                                                                                                                                                                                                                 |
