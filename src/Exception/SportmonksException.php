<?php

declare(strict_types=1);

namespace Kash\Sportmonks\Football\Exception;

use Throwable;

/**
 * Implemented by the request and date errors this package throws, so one catch handles both.
 */
interface SportmonksException extends Throwable {}
