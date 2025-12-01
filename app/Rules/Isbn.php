<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class Isbn implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if ($value === null || $value === '') {
            return;
        }

        $clean = str_replace(['-', ' '], '', $value);

        if (strlen($clean) === 10 && $this->isValidIsbn10($clean)) {
            return;
        }

        if (strlen($clean) === 13 && $this->isValidIsbn13($clean)) {
            return;
        }

        $fail("The {$attribute} must be a valid ISBN-10 or ISBN-13.");
    }

    private function isValidIsbn10(string $isbn): bool
    {
        if (!preg_match('/^\d{9}[\dX]$/', $isbn)) {
            return false;
        }

        $sum = 0;
        for ($i = 0; $i < 9; $i++) {
            $sum += ((int) $isbn[$i]) * ($i + 1);
        }

        $check = $isbn[9] === 'X' ? 10 : (int) $isbn[9];

        return ($sum + $check * 10) % 11 === 0;
    }

    private function isValidIsbn13(string $isbn): bool
    {
        if (!preg_match('/^\d{13}$/', $isbn)) {
            return false;
        }

        $sum = 0;
        for ($i = 0; $i < 12; $i++) {
            $digit = (int) $isbn[$i];
            $sum += $digit * ($i % 2 === 0 ? 1 : 3);
        }

        $checkDigit = (10 - ($sum % 10)) % 10;

        return $checkDigit === (int) $isbn[12];
    }
}
