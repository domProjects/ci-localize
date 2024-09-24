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
Dans le fichier **app/Config/Filters.php**, ajoutez la ligne suivante :

```php
    public array $aliases = [
        // ...

        'localize' => \App\Filters\Localize::class,
    ];
```

Toujours dans le même fichier :

```php
    public array $globals = [
        'before' => [
            // ...

            'localize',
        ],
    ];
```


#### App setup
Dans le fichier **app/Config/App.php**, modifiez la ligne suivante :

```php
    public bool $negotiateLocale = false;
```
par
```php
    public bool $negotiateLocale = true;
```


## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.
