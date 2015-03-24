<?php

namespace App\Storages\Day;

use App\Day;
use App\Holiday;

class EloquentDayRepository implements DayRepository
{
    /**
     * get all the registered holidays
     * for the currently logged in user
     *
     * @return mixed
     */

    public function getAllRegisteredHolidaysOfAEmployee()
    {
        $holidays = Auth::user()->holidays()->get();
        return $holidays;
    }

    /**
     * Add a record to the holidays table
     * for the currently logged in user
     *
     * @param integer
     * @return void
     */

    public function addHolidayForAEmployee($date)
    {
        $holiday = new Holiday();
        $holiday->date = $date;
        $holiday->user()->associate(Auth::user());
        $holiday->save();
    }


    /**
     * Remove a record from the holidays table
     * for the currently logged in user
     *
     * @param integer
     * @return void
     */

    public function deleteHolidayForAEmployee($id)
    {
        Holiday::find($id)->delete();
    }




    public function scopeMonth($query, $month)
    {
        return $query->where('date->__getMonth', '=', $month);
    }
}