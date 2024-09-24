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

Modification du fichier **app/Config/Filters.php**. Ajoutez la ligne suivante :

```php
    public array $aliases = [
        // ...
        'localize' => \App\Filters\Localize::class,
    ];
```

et toujours dans le même fichier :

```php
    public array $globals = [
        'before' => [
            // ...
            'localize',
        ],
    ];
```

Modification du fichier **app/Controllers/BaseController.php**. Ajoutez les lignes suivantes :

```php
abstract class BaseController extends Controller
{
    // ...

    /**
     *
     */
    protected $locale;

    /**
     *
     */
    protected $supportedLocales;

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // ...

        //
        $configApp = config(\Config\App::class);

        // Retrieval of variables for the language
        $this->locale = $request->getLocale();
        $this->supportedLocales = $configApp->supportedLocales;

        // ...
    }
}
```

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.
