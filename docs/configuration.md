# Configuration

The package is mostly configured through the `voyager-shop.php` configuration file. Some values are available in the `.env` environment configuration file.

## Environment

After requiring the `tjventurini/voyager-shop` package, you will need to update your environment configuration. Add the following environment variables.

```
PASSPORT_CLIENT_ID=<client-id>
PASSPORT_CLIENT_SECRET=<client-secret>

STRIPE_KEY=<stripe-public-key>
STRIPE_SECRET=<stripe-secret-key>

STRIPE_WEBHOOK_SECRET=<stripe-webhook-secret>
```

## Configuration

The `voyager-shop.php` configuration file holds most of the configuration options available for this package. Read this section carefully to understand how you can influence the behavior of the package to match your needs.

|             Key             | Description                                                                                                                                                                                                     |
|:---------------------------:|:----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
|    `voyager-shop.tables`    | Holds an array of tables used in the relationships of this package. Feel free to overwrite them as needed. Take a look at the `Tjventurini/VoyagerShop/Traits/Relationships` traits for more information.       |
|    `voyager-shop.models`    | Holds an array of models used in the relationships of this package. Feel free to overwrite them as needed. Take a look at the `Tjventurini/VoyagerShop/Traits/Relationships` traits for more information.       |
| `voyager-shop.foreign_keys` | Holds an array of foreign_keys used in the relationships of this package. Feel free to overwrite them as needed. Take a look at the `Tjventurini/VoyagerShop/Traits/Relationships` traits for more information. |
|   `voyager-shop.currency`   | The currency to use for all transactions behind the scenes.                                                                                                                                                     |
| `voyager-shop.order_states` | Holds an array of states an order can have. Feel free to change the values, but don't change the keys.                                                                                                          |
|  `voyager-shop.validation`  | Holds an array of validation rules used by the controllers of this package to validate the given entities in the admin panel as well as in the graphql mutations.                                               |