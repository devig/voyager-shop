# Models

This package comes with a lot of models. This section of the documentation tries to describe them in short words.

## Address

User addresses to deliver the order to or to use as billing address.

|       -       | Description                                             |
|:-------------:|:--------------------------------------------------------|
| Relationships | This belongs to a `Project`, an `User` and a `Country`. |
|  SoftDeletes  | This model uses soft deletes.                           |

## Card

Payment methods related to users. It also keeps a reference of the payment method saved to stripe.

|       -       | Description                         |
|:-------------:|:------------------------------------|
| Relationships | Belongs to `Project` and an `User`. |

## Country

Represents countries used in a project.

|       -       | Description                                                                         |
|:-------------:|:------------------------------------------------------------------------------------|
| Relationships | Belongs to a `Project`, has many `Address`, has many taxes and has many `Currency`. |

## Currency 

Currencies used in a project.

|       -       | Description                                 |
|:-------------:|:--------------------------------------------|
| Relationships | Belongs to `Project`, belongs to `Country`. |

## Order

Represents a customer order in the shop.

|       -       | Description                                                                                                                    |
|:-------------:|:-------------------------------------------------------------------------------------------------------------------------------|
| Relationships | Belongs to `Project`, belongs to `User`, belongs to billing `Address`, belongs to shipping `Address` and has many `OrderItem`. |
|  Attributes   | By default an `Order` gets created with an order state or `cart`.                                                              |
|       -       | The `price` attribute is calculated from the order items related to the order.                                                 |
|       -       | The `price_raw` attribute is calculated from the order items related to the order, but represented as integer.                 |
|       -       | The `price_net` attribute is calculated from the order items related to the order.                                             |
|       -       | The `price_gross` attribute is calculated from the order items related to the order.                                           |

## OrderItem

Represents an item of a cart/order.

|       -       | Description                                                                                    |
|:-------------:|:-----------------------------------------------------------------------------------------------|
| Relationships | Belongs to `Order` and belongs to `ProductVariant`.                                            |
|  Attributes   | The `price` attribute represents the `price` attribute of the related product variant.         |
|       -       | The `price_raw` attribute represents the `price_raw` attribute of the related product variant. |
|       -       | The `price_net` attribute represents the `price_net` attribute of the related product variant. |
|       -       | The `price_net` attribute represents the `price_net` attribute of the related product variant. |

## Product

Represents a base product in the shop and holds all general information about the buyable product.

|       -       | Description                                                                                  |
|:-------------:|:---------------------------------------------------------------------------------------------|
| Relationships | Belongs to `Project`, belongs to `Tax`, has many `ProductVariant` and belongs to many `Tag`. |
| Eager Loading | This model eager loads it's `productVariants` relationship.                                  |

## ProductVariant

Represents a buyable product in the shop. Each `Product` has at least one `ProductVariant`. The `ProductVariant` model holds the detailed information about the `Product`.

|       -       | Description                                                                                                                                                                                         |
|:-------------:|:----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| Relationships | Belongs to `Product`.                                                                                                                                                                               |
|  Attributes   | The `price` attribute represents the saved integer value from the `price` column in the database as a float value. Meaning it will be divided through 100. This way we can prevent rounding errors. |
|       -       | The `price_raw` attribute will return the raw integer value from the database that is saved in the `price` column.                                                                                  |
|       -       | The `price_net` attribute checks the `includes_tax` attribute of the related `Product` model and calculates the net price of the product.                                                           |
|       -       | The `price_gross` attribute checks the `includes_tax` attribute of the related `Product` model and calculates the gross price of the product.                                                       |

## Project

This model overwrites the `Tjventurini\VoyagerProjects\Models\Project` model to implement the relationships.

|       -       | Description                                                           |
|:-------------:|:----------------------------------------------------------------------|
| Relationships | Has many `Product`, `Address`, `Order`, `Card`, `Currency` and `Tax`. |

## Tag

This model overwrites the `Tjventurini\VoyagerTags\Models\Tag` model to implement the relationships.

|       -       | Description           |
|:-------------:|:----------------------|
| Relationships | Belongs to `Project`. |

## Tax

This model represents the taxes used in your project. 

|       -       | Description                         |
|:-------------:|:------------------------------------|
| Relationships | Belongs to `Project` and `Country`. |