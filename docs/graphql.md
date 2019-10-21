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

|   Query    | Parameters      | Returns          | Description                                          |                                    |
|:----------:|:----------------|:-----------------|:-----------------------------------------------------|:-----------------------------------|
|  products  | -               | `[Product!]!`    | Query all products available in the current project. |                                    |
|  product   | `slug: String!` | `Product!`       | Query a specific product by slug.                    |                                    |
| countries  | -               | `[Country!]!`    | Query all available countries in this project.       |                                    |
|  country   | -               | `code: String!`  | `Country!`                                           | Query a specific country by code.  |
|   taxes    | -               | `[Tax!]!`        | Query all available taxes in this project.           |                                    |
|    tax     | -               | `id: String!`    | `Tax!`                                               | Query a specific tax by id.        |
| currencies | -               | `[Currency!]!`   | Query all available currencies in this project.      |                                    |
|  currency  | -               | `code: String!`  | `Currency!`                                          | Query a specific currency by code. |
|    cart    | -               | `token: String!` | `Order!`                                             | Query a specific cart by token.    |
|   orders   | -               | `[Order!]!`      | Query all available orders of the logged in user.    |                                    |
|   cards    | -               | `[Card!]!`       | Query all available cards of the logged in user.     |                                    |
