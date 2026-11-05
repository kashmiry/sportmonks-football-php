<?php

declare(strict_types=1);

namespace Sportmonks\Football;

use DateTimeImmutable;
use Sportmonks\Football\Exception\InvalidDateFormatException;

class FootballApiHelper
{
    /**
     * Validates a date string strictly against the format and returns it normalized.
     *
     * @throws InvalidDateFormatException
     */
    public static function verifyDate(string $date, string $format = 'Y-m-d'): string
    {
        $dateTime = DateTimeImmutable::createFromFormat($format, $date);
        $errors = DateTimeImmutable::getLastErrors();

        if ($dateTime === false || ($errors !== false && $errors['warning_count'] + $errors['error_count'] > 0)) {
            throw new InvalidDateFormatException(sprintf('Invalid date "%s": expected format %s.', $date, $format));
        }

        return $dateTime->format($format);
    }
}
