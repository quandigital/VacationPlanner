<?php

namespace app\Storages\User;

interface UserRepository
{

    public function getAllRegisteredHolidaysOfAUser($id);

    public function registerHolidayForAUser($user_id, $day_id);

    public function unregisterHolidayForAUser($user_id, $day_id);

}