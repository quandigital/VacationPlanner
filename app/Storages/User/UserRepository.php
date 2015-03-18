<?php

namespace app\Storages\User;

interface UserRepository
{

    public function getAllRegisteredHolidaysOfAEmployee();

    public function addHolidayForAEmployee($day_id);

    public function updateHolidayForAEmployee($day_id);

    public function deleteHolidayForAEmployee($day_id);

}