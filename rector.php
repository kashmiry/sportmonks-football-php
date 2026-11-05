<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Php81\Rector\Property\ReadOnlyPropertyRector;

return RectorConfig::configure()
    ->withPaths([__DIR__ . '/src', __DIR__ . '/tests'])
    ->withPhpSets()
    ->withPreparedSets(typeDeclarations: true, deadCode: true, codeQuality: true)
    ->withAttributesSets(phpunit: true)
    ->withSkip([
        // Tests replace the HTTP client via reflection until it can be injected.
        ReadOnlyPropertyRector::class => [__DIR__ . '/src/FootballClient.php'],
    ]);
