# Manage seeders like migrations

[![Latest Version on Packagist](https://img.shields.io/packagist/v/curicows/laravel-seeder-manager.svg?style=flat-square)](https://packagist.org/packages/curicows/laravel-seeder-manager)
[![Total Downloads](https://img.shields.io/packagist/dt/curicows/laravel-seeder-manager.svg?style=flat-square)](https://packagist.org/packages/curicows/laravel-seeder-manager)

[//]: # (![GitHub Actions]&#40;https://github.com/curicows/laravel-seeder-manager/actions/workflows/main.yml/badge.svg&#41;)

This package allows you to manage your seeders like migrations. You can run and will not run again.

I'm working on more features like rollback and more. Total WIP.

## Installation

You can install the package via composer:

```bash
composer require curicows/laravel-seeder-manager
```

## Usage
Seed a database with a seeder interface:

```php
class DataSeeder extends Seeder implements SeedDatabase
{
    public function getName(): string
    {
        return 'DataSeeder';
    }

    public function seed(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'test@test.com',
        ]);
    }
}
```

Or a manager to handle multiple seeders:

```php
class DataManagerSeeder extends Seeder implements ManagerSeeder
{
    public function getName(): string
    {
        return 'DataManagerSeeder';
    }

    public function getSeeders(): array
    {
        return [
            DataSeeder::class,
        ];
    }
}
```


[//]: # (### Testing)

[//]: # ()
[//]: # (```bash)

[//]: # (composer test)

[//]: # (```)

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email curicows@curicows.com instead of using the issue tracker.

## Credits

-   [Curicows](https://github.com/curicows)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
