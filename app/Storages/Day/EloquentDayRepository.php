<?php

namespace App\Storages\Day;

use App\Day;

class EloquentDayRepository implements DayRepository
{
    // actual methods to be inserted
    public function index()
    {
        return 'index from EloquentDayRepository';
    }

}