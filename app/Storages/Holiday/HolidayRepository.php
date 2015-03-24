<?php

namespace App\Storages\Day;

interface DayRepository
{
    public function getAllRegisteredHolidaysOfAEmployee();

    public function addHolidayForAEmployee($date);

    public function deleteHolidayForAEmployee($date);
}

