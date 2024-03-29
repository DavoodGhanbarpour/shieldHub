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

if (! function_exists('addSeparator')) {
    function addSeparator(?float $number): string
    {
        return number_format($number,fmod($number, 1) == 0 ? 0 : 3);
    }
}

if (! function_exists('getFreeStorageAsGB')) {
    function getFreeStorageAsGB(string $dir = '/'): float
    {
        return round( ( disk_free_space($dir) ) / 1024 / 1024 / 1024, 2 );
    }
}


if (! function_exists('getFullStorageAsGB')) {
    function getFullStorageAsGB(string $dir = '/'): float
    {
        return round( ( disk_total_space($dir) ) / 1024 / 1024 / 1024, 2 );
    }
}

if (! function_exists('abbreviation')) {
    function abbreviation(?string $string, int $length = 20): string
    {
        if(!isset($string)){
            return '';
        }

        if (strlen($string) >= $length) {
            return mb_substr($string, 0, $length) . '...';
        }
        return $string;
    }
}

if (! function_exists('makeJsonInsteadView')) {
    function makeJsonInsteadView(string $viewName, array $data, int $code = 200)
    {
        if(request()->wantsJson()){
            return response()->json($data, $code);
        }
        else{
            return view($viewName, $data);
        }
    }
}

