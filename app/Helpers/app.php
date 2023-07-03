<?php

use App\Models\User;
use Carbon\Carbon;
use Morilog\Jalali\CalendarUtils;
use Morilog\Jalali\Jalalian;

if (! function_exists('convertDate')) {
    function convertDate($date, $destCalendar = null)
    {
        if (! isset($destCalendar)) {
            $destCalendar = config()->get('app.locale');
        }

        if ($destCalendar == User::SUPPORTED_LANGUAGES['fa']['key']) {
            $dateInCarbon = Carbon::parse($date);
            $date = CalendarUtils::toJalali(
                $dateInCarbon->year,
                $dateInCarbon->month,
                $dateInCarbon->day,
            );
            $date = (new Jalalian($date[0], $date[1], $date[2], 0, 0, 0))->format('Y-m-d');
        }

        return $date;
    }
}


if (! function_exists('removeSeparator')) {
    function removeSeparator(string $string): string
    {
        return str_replace(',','', $string);
    }
}
