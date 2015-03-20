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
     * @param integer
     * @return void
     */

    public function addHolidayForAEmployee($holiday_id)
    {
        Auth::user()->holidays()->attach($holiday_id);
    }

    /**
     * Update a record on the pivot table
     * for the currently logged in user
     *
     * @param integer
     * @return void
     */

    public function updateHolidayForAEmployee($holiday_id)
    {
        Auth::user()->holidays()->updateExistingPivot($holiday_id);
    }

    /**
     * Remove a record from the pivot table
     * for the currently logged in user
     *
     * @param integer
     * @return void
     */

    public function deleteHolidayForAEmployee($holiday_id)
    {
        Auth::user()->holidays()->detach($holiday_id);
    }

}
