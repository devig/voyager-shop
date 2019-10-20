# Models

This package comes with a lot of models. This section of the documentation tries to describe them in short words.

## Address

User addresses to deliver the order to or to use as billing address.

|       -       | Description                                       |
|:-------------:|:--------------------------------------------------|
| Relationships | This belongs to a project, an user and a country. |
|  SoftDeletes  | This model uses soft deletes.                     |

## Card

Payment methods related to users. It also keeps a reference of the payment method saved to stripe.

|       -       | Description                     |
|:-------------:|:--------------------------------|
| Relationships | Belongs to project and an user. |

## Country

Represents countries used in a project.

|       -       | Description                                                                       |
|:-------------:|:----------------------------------------------------------------------------------|
| Relationships | Belongs to a project, has many addresses, has many taxes and has many currencies. |

## Currency 

Currencies used in a project.

|       -       | Description                             |
|:-------------:|:----------------------------------------|
| Relationships | Belongs to project, belongs to country. |

## Order

Represents a customer order in the shop.

|       -       | Description                                                                                                            |
|:-------------:|:-----------------------------------------------------------------------------------------------------------------------|
| Relationships | Belongs to project, belongs to user, belongs to billing address, belongs to shipping address and has many order items. |
|  Attributes   | By default an order gets created with an order state or `cart`.                                                        |
|       -       | The `price` attribute is calculated from the order items related to the order.                                         |
|       -       | The `price_raw` attribute is calculated from the order items related to the order, but represented as integer.         |

## OrderItem

Represents an item of a cart/order.

| - | Description |
|:-:|:-|
|Relationships|Belongs to order and belongs to product variant.|
|Attributes|The `price` attribute represents the `price` attribute of the related product variant.|
