<?php

namespace App\Http\Helpers;

use Carbon\Carbon;

class CarbonHelper
{

    public static function fromNow($created_at): string
    {
        $date = Carbon::parse($created_at);
        $now = Carbon::now();

        $yearInterval = $now->year - $date->year;

        $monthInterval = $now->month - $date->month;
        if ($monthInterval < 0) {
            --$yearInterval;
            $monthInterval += 12;
        }

        $dayInterval = $now->day - $date->day;
        if ($dayInterval < 0) {
            $monthInterval--;
            $dayInterval += 30;
        }

        $hoursInterval = $now->hour - $date->hour;
        if ($hoursInterval < 0) {
            $dayInterval--;
            $hoursInterval = $hoursInterval + 24;
        }

        $minutesInterval = $now->minute - $date->minute;
        if ($minutesInterval < 0) {
            $hoursInterval--;
            $minutesInterval += 60;
        }

        if ($yearInterval == 0 && $monthInterval == 0 && $dayInterval == 0 && $hoursInterval == 0) {
            return $minutesInterval . ' minut oldin';
        }

        if ($yearInterval == 0 && $monthInterval == 0 && $dayInterval == 0) {
            if ($minutesInterval == 0)
                return $hoursInterval . ' soat oldin';

            return $hoursInterval . ' soat-u ' . $minutesInterval . ' minut oldin ';
        }

        if ($yearInterval == 0 && $monthInterval == 0) {
            return $dayInterval . ' kun oldin';
        }

        if ($yearInterval == 0) {
            return $monthInterval . ' oy oldin';
        }

        return $yearInterval . ' yil oldin';
        }

}
