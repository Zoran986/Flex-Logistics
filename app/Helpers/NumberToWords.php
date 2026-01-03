<?php

if (! function_exists('numberToMacedonianWords')) {
    function numberToMacedonianWords($number)
    {
        $units = [
            0 => 'нула',
            1 => 'еден',   2 => 'две',    3 => 'три',
            4 => 'четири', 5 => 'пет',    6 => 'шест',
            7 => 'седум',  8 => 'осум',   9 => 'девет',
        ];

        $teens = [
            10 => 'десет',     11 => 'единаесет', 12 => 'дванаесет',
            13 => 'тринаесет', 14 => 'четиринаесет', 15 => 'петнаесет',
            16 => 'шестнаесет', 17 => 'седумнаесет', 18 => 'осумнаесет',
            19 => 'деветнаесет'
        ];

        $tens = [
            2 => 'дваесет', 3 => 'триесет', 4 => 'четириесет',
            5 => 'педесет', 6 => 'шеесет', 7 => 'седумдесет',
            8 => 'осумдесет', 9 => 'деведесет'
        ];

        $hundreds = [
            1 => 'сто', 2 => 'двесте', 3 => 'триста',
            4 => 'четиристотини', 5 => 'петстотини', 6 => 'шестотини',
            7 => 'седумстотини', 8 => 'осумстотини', 9 => 'деветстотини'
        ];

        $num = intval($number);

        if ($num < 10) {
            return $units[$num];
        }

        if ($num < 20) {
            return $teens[$num];
        }

        if ($num < 100) {
            $t = intval($num / 10);
            $u = $num % 10;

            return $u === 0 ? $tens[$t] : $tens[$t] . ' и ' . $units[$u];
        }

        if ($num < 1000) {
            $h = intval($num / 100);
            $rest = $num % 100;

            if ($rest === 0) {
                return $hundreds[$h];
            }

            return $hundreds[$h] . ' ' . numberToMacedonianWords($rest);
        }

        // Thousands
        if ($num < 1_000_000) {
            $th = intval($num / 1000);
            $rest = $num % 1000;

            $thWords = ($th == 1) ? 'илјада' : numberToMacedonianWords($th) . ' илјади';

            return $rest === 0 ? $thWords : $thWords . ' ' . numberToMacedonianWords($rest);
        }

        return $number; // fallback
    }
}
