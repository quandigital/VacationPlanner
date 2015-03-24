<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Storages\Day\HolidayRepository;

class HolidayController extends Controller
{

    protected $holiday;

    public function __construct(HolidayRepository $holiday)
    {
        $this->holiday = $holiday;
    }

    // access methods from EloquentHolidayRepository now via
    // $this->day->anyMethod()

}

