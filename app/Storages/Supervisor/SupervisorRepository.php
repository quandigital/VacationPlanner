<?php

namespace app\Storages\Supervisor;


interface SupervisorRepository {

    public function getAllHolidaysOfAllEmployees();

    public function authorizeHoliday($id, $day_id);

}