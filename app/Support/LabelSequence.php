<?php

namespace App\Support;

final class LabelSequence
{
    /**
     * Minimal 3 digit (001); lebar bertambah otomatis jika > 999.
     */
    public static function format(int $sequenceNumber): string
    {
        $n = max(1, $sequenceNumber);
        $s = (string) $n;
        $width = max(3, strlen($s));

        return str_pad($s, $width, '0', STR_PAD_LEFT);
    }
}
