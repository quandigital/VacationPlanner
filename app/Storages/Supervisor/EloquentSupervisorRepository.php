<?php

namespace app\Storages\Supervisor;

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class EloquentSupervisorRepository implements SupervisorRepository {

    /**
     * get the holidays of all Employees
     * regardless whether they are authorized yet
     *
     * @return mixed
     */

    public function getAllHolidaysOfAllEmployees()
    {
        $holidaysOfAllEmployees = User::all()->holidays()->get();
        return $holidaysOfAllEmployees;
    }

    /**
     * authorize holiday of a certain Employee
     *
     * @param integer
     * @param integer
     * @return void
     */

    public function authorizeHoliday($id, $day_id)
    {
        User::find($id)->holidays()->attach($day_id, ['authorized_by' => Auth::user()->name,
                                                      'authorized_at' => Carbon::now()]);
    }

}