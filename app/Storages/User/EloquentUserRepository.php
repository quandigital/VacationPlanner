<?php

namespace app\Storages\User;

use App\User;
use Illuminate\Database\Eloquent\Model;

class EloquentUserRepository implements UserRepository
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
     * Add a record to the pivot table
     * for the currently logged in user
     *
     */

    public function addHolidayForAEmployee($day_id)
    {
        Auth::user()->holidays()->attach($day_id);
    }

    /**
     * Update a record on the pivot table
     * for the currently logged in user
     *
     */

    public function updateHolidayForAEmployee($day_id)
    {
        Auth::user()->holidays()->updateExistingPivot($day_id);
    }

    /**
     * Remove a record from the pivot table
     * for the currently logged in user
     *
     * @param $day_id
     */

    public function deleteHolidayForAEmployee($day_id)
    {
        Auth::user()->holidays()->detach($day_id);
    }

}
