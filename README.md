# CodeIgniter Localize

Allows you to easily change and manage the language of your CodeIgniter project.


## Getting Started

### Prerequisites

Usage of Localize requires the following:

- A [CodeIgniter 4.5.0+](https://github.com/codeigniter4/CodeIgniter4/) based project
- [Composer](https://getcomposer.org/) for package management
- PHP 8.1+

### Installation

Installation is done through Composer.

```console
composer require domprojects/ci-localize
```

#### Filters setup
In the **app/Config/Filters.php** file, add the following line:

```php
    public array $aliases = [
        // ...
        'localize' => \App\Filters\Localize::class,
    ];
```

Still in the same file:

```php
    public array $globals = [
        'before' => [
            // ...
            'localize',
        ],
    ];
```


#### App setup
In the **app/Config/App.php** file, modify the following line:

```php
    public bool $negotiateLocale = false;
```
by
```php
    public bool $negotiateLocale = true;
```


## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.
