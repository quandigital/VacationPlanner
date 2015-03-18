<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Storages\Day\DayRepository;

class DayController extends Controller
{

    protected $day;

    public function __construct(DayRepository $day)
    {
        $this->day = $day;
    }

    // access methods from EloquentDayRepository now via
    // $this->day->anyMethod()

}

