<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Storages\Day\DayRepository;

class DaysController extends Controller
{

    protected $day;

    public function __construct(DayRepository $day)
    {
        $this->day = $day;
    }

    public function all()
    {
        return $this->day->index();

    }

}

