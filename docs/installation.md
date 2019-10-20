# Installation

The installation of this package is made very easy. Just run the following commands for the basic setup.

```bash
composer require tjventurini/voyager-shop
php aritsan voyager-shop:install
```

The second command will publish all assets of the package and its dependencies. Also it will run the migrations.

## Flags

The `voyager-shop:install` command has multiple flags described here.

|   Flag    | Description                                                      |
|:---------:|:-----------------------------------------------------------------|
|  --force  | Publish assets forcefully                                        |
|  --demo   | Use demo content seeder to setup some demo data in the database. |
| --refresh | Refresh the database of the project.                             |