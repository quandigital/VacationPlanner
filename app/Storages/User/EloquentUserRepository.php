<?php

namespace app\Storages\User;

use App\User;
use Illuminate\Database\Eloquent\Model;

class EloquentUserRepository implements UserRepository
{

    public function getAllRegisteredHolidaysOfAUser($id)
    {
        $holidays = User::find($id)->holidays();
        return $holidays;
    }


    /**
     * Adds a record to the pivot table
     *
     * @param $user_id
     * @param $day_id
     */
    public function registerHolidayForAUser($user_id, $day_id)
    {
        User::find($user_id)->holidays()->attach($day_id);
    }


    /**
     * Removes a record from the pivot table
     *
     * @param $user_id
     * @param $day_id
     */
    public function unregisterHolidayForAUser($user_id, $day_id)
    {
        User::find($user_id)->holidays()->detach($day_id);
    }

}
