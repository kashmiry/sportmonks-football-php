<?php

declare(strict_types=1);

namespace Kash\Sportmonks\Football\Exception;

use InvalidArgumentException;

class InvalidDateFormatException extends InvalidArgumentException implements SportmonksException {}
