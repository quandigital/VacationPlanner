<?php

namespace App\Calendar;

use Carbon\Carbon;

class Calendar {

    // in constructor monat übergeben
    function __construct()
    {
        $this->now = Carbon::now();

    }

    public function prepareCalendarData($cal, $year)
    {
        //__get('daysInMonth'), __get('month')
        $daysInCurrentMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        $firstDayInMonth = date('w', strtotime("$year-$month-01"));
        return $CalendarData = ['daysInCurrentMonth' => $daysInCurrentMonth,
            'FirstDayInMonth' => $firstDayInMonth];
    }

    function holidays($year = null)
    {
        $year = is_null($year) ? Carbon::now()->__get('year') : $year;

        $static = $this->setStaticHolidays($year);
        $variable = $this->setVariableHolidays($year);

        $holidays = array_merge($static,$variable);

        $holidays = asort($holidays);

        return var_dump($holidays);

        //array_multisort($date, SORT_DESC, $holidays);

        //return $holidays;

    }

    public function createCarbonInstance($year, $month, $day)
    {
        return Carbon::createFromFormat($year, $month, $day, null);
    }

    function setStaticHolidays($year)
    {
        $staticHolidays = [];
        $staticHolidays['Neujahr'] = Carbon::createFromDate($year, 01, 01);
        $staticHolidays['Tag der Arbeit'] = Carbon::createFromDate($year, '05', '01');
        $staticHolidays['Tag der Deutschen Einheit'] = Carbon::createFromDate($year, '10', '03');
        $staticHolidays['1. Weihnachtsfeiertag'] = Carbon::createFromDate($year, '12', '25');
        $staticHolidays['2. Weihnachtsfeiertag'] = Carbon::createFromDate($year, '12', '26');
        return $staticHolidays;
    }

    function setVariableHolidays($year)
    {
        // easter date of the current Year as a Carbon instance
        //$easter = Carbon::createFromTimestamp(easter_date(Carbon::now()->__get('year')));

        $easter = Carbon::createFromTimestamp(easter_date($year));

        $variableHolidays = [];
        $variableHolidays['Karfreitag'] = $easter->subDays(2);
        $variableHolidays['Ostermontag'] = $easter->addDays(1);
        $variableHolidays['Christ Himmelfahrt'] = $easter->addDays(39);
        $variableHolidays['Pfingstmontag'] = $easter->addDays(50);

        return $variableHolidays;

    }

}