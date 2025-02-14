<?php

use App\Services\ExternalData\MuseumExternalData\ArtworksExternalData\SearchExternalArtworks;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->withBindings([
        App\Interfaces\ExternalDataApi\SearchExternalArtworksInterface::class => SearchExternalArtworks::class,
    ])

    ->create();
