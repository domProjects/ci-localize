<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class Localize implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (! $request instanceof IncomingRequest)
        {
            return;
        }

        //
        $configApp = config(\Config\App::class);
 
        log_message('debug', "FilterLocalize --- start ---");
        $uri = $request->getUri();
        $segments = array_filter($uri->getSegments());
        $nbSegments = count($segments);
        log_message('debug', "FilterLocalize - {$nbSegments} segments = " . print_r($segments, true));

        // Keep only the first 2 letters (en-UK => en)
        $userLocale = strtolower(substr($request->getLocale(), 0, 2));
        log_message('debug', "FilterLocalize - Visitor's locale $userLocale");

        // If the user's language is not a supported language, take the default language
        $locale = in_array($userLocale, $configApp->supportedLocales) ? $userLocale : $configApp->defaultLocale;
        log_message('debug', "FilterLocalize - Selected locale $locale");

        // If we request /, redirect to /{locale}
        if ($nbSegments == 0)
        {
            log_message('debug', "FilterLocalize - Redirect / to /{$locale}");
            log_message('debug', "FilterLocalize --- end ---");
            return redirect()->to("/{$locale}");
        }

        log_message('debug', "FilterLocalize - segments[0] = " . $segments[0]);
        $locale = $segments[0];

        // If the first segment of the URI is not a valid locale, trigger a 404 error
        if (! in_array($locale, $configApp->supportedLocales))
        {
            log_message('debug', "FilterLocalize - ERROR Invalid locale '{$locale}'");
            log_message('debug', "FilterLocalize --- end ---");
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        log_message('debug', "FilterLocalize - Valid locale '$locale'");
        log_message('debug', "FilterLocalize --- end ---");
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null): void
    {
        // Do something here
    }
}
