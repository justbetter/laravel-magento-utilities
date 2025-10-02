# Laravel Magento Utilities

<p>
    <a href="https://github.com/justbetter/laravel-magento-utilities"><img src="https://img.shields.io/github/actions/workflow/status/justbetter/laravel-magento-utilities/tests.yml?label=tests&style=flat-square" alt="Tests"></a>
    <a href="https://github.com/justbetter/laravel-magento-utilities"><img src="https://img.shields.io/github/actions/workflow/status/justbetter/laravel-magento-utilities/coverage.yml?label=coverage&style=flat-square" alt="Coverage"></a>
    <a href="https://github.com/justbetter/laravel-magento-utilities"><img src="https://img.shields.io/github/actions/workflow/status/justbetter/laravel-magento-utilities/analyse.yml?label=analysis&style=flat-square" alt="Analysis"></a>
    <a href="https://github.com/justbetter/laravel-magento-utilities"><img src="https://img.shields.io/packagist/dt/justbetter/laravel-magento-utilities?color=blue&style=flat-square" alt="Total downloads"></a>
</p>

A set of common utilities to ease working with Magento. All helpers implement caching to reduce overhead. It will cache the results for a day by default. Caching can be disabled via the configuration file.

## Utilities

Currently, this packge provides the following utilities:

- Fetching all stores.
- Fetching all websites.

## Example

An example to fetch all websites.

```php
use JustBetter\MagentoUtilities\Contracts\GetsWebsites;

$contract = app(GetsWebsites::class);

$websites = $contract->get();
```

## Installation

Install the composer package.

```bash
composer require justbetter/laravel-magento-utilities
```

## Setup

Optionally publish the configuration of the package.

```bash
php artisan vendor:publish --provider="JustBetter\MagentoUtilities\ServiceProvider" --tag=config
```

## Quality

To ensure the quality of this package, run the following command:

```bash
composer quality
```

This will execute three tasks:

1. Makes sure all tests are passed
2. Checks for any issues using static code analysis
3. Checks if the code is correctly formatted

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Ramon Rietdijk](https://github.com/ramonrietdijk)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

<a href="https://justbetter.nl" title="JustBetter">
    <img src="./art/footer.svg" alt="JustBetter logo">
</a>
