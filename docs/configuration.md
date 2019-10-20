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

|          Key          | Description                                                                                                                                                                          |
|:---------------------:|:-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `voyager-shop.tables` | Holds an array of tables used in the relationships of this package. Feel free to overwrite them as needed. Take a look at the `Tjventurini/VoyagerShop/Traits/Relationships` traits. |