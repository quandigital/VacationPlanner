<?php

namespace app\Storages\User;

interface UserRepository
{

    public function getAllRegisteredHolidaysOfAEmployee();

    public function addHolidayForAEmployee($holiday_id);

    public function updateHolidayForAEmployee($holiday_id);

    public function deleteHolidayForAEmployee($holiday_id);

}