# Validation

All validation done in the services or the controllers, is done with rules from the `voyager-shop` configuration. If you change the columns of a tables, change fields of a model or change the BREAD in Voyager you will might need to update the validation rules in the configuration file.

Here are all validation rules from the configuration.

```php

...

    /*
    |--------------------------------------------------------------------------
    | Validation
    |--------------------------------------------------------------------------
    |
    | In this section you can overwrite the validation rules used for each
    | entity.
    |
    */
    
    'validation' => [

        'address' => [
            'id' => 'sometimes|exists:addresses,id',
            'name' => 'required|string|min:3',
            'street' => 'required|string|min:3',
            'zip' => 'required|string|min:4',
            'project_id' => 'sometimes|exists:projects,id',
            'country_id' => 'sometimes|exists:countries,id',
            'country' => 'sometimes|string|size:2|exists:countries,code',
            'user_id' => 'sometimes|exists:users,id',
        ],

        'cards' => [
            'name' => 'required|min:3',
            'brand' => 'required|min:3',
            'last_four' => 'required|digits:4',
            'stripe_id' => 'required|min:3',
            'project_id' => 'sometimes|exists:projects,id',
            'user_id' => 'sometimes|exists:users,id',
        ],

        'countries' => [
            'name' => 'required|min:3',
            'code' => 'required|regex:/^[A-Z]{3}$/',
            'country_belongsto_project_relationship' => 'required|exists:projects,id',
        ],

        'currencies' => [
            'name' => 'required|min:3',
            'code' => 'required|regex:/^[A-Z]{3}$/',
            'sign' => 'required|min:1|max:1',

            'project_id' => 'required|exists:projects,id',
            'country_id' => 'required|exists:countries,id',
        ],

        'order_items' => [
            'order_item_belongsto_product-variant_relationship' => 'required|exists:product_variants,id',
            'quantity' => 'required|numeric|min:1',
            'order_item_belongsto_order_relationship' => 'required|exists:orders,id',
        ],

        'orders' => [
            'state' => 'required|in:cart,pending,billed,canceled,declined,refunded',
            'order_belongsto_project_relationship' => 'required|exists:projects,id',
            'order_belongsto_user_relationship' => 'required|exists:users,id',
        ],

        'products' => [
            'name' => 'required|min:3',
            'slug' => 'required|min:3',
            'description' => 'required|min:3',
            'includes_tax' => 'sometimes|required|boolean',
            'project_id' => 'required|exists:projects,id',
            'tax_id' => 'required|exists:taxes,id',
        ],

        'product_variants' => [
            'name' => 'required|min:3',
            'details' => 'required|min:3',
            'price' => 'required|numeric',
            'product_id' => 'required|exists:products,id',
        ],

        'taxes' => [
            'name' => 'required|min:3',
            'tax' => 'required|digits:2',
            'project_id' => 'required|exists:projects,id',
            'country_id' => 'required|exists:countries,id',
        ],

        ...

```
