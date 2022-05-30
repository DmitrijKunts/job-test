<?php

namespace App\Actions;

class CalcWin
{
    public static function calc(int $point)
    {
        if ($point % 2 == 0) {
            $wl = 'Win';
            if ($point > 900) {
                $summa = 0.7 * $point;
            } elseif ($point > 600) {
                $summa = 0.5 * $point;
            } elseif ($point > 300) {
                $summa = 0.3 * $point;
            } else { //меньше чем 300
                $summa = 0.1 * $point;
            }
        } else {
            $wl = 'Lose';
            $summa = 0;
        }

        return [
            'win_lose' => $wl,
            'win_summ' => $summa,
        ];
    }
}
