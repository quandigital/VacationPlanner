<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Calendar\Calendar;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class PagesController extends Controller {



    public function index($date = null)
    {
        if (is_null($date)) {
            $date = Carbon::now();
        }
        else {
            $date = Carbon::parse($date);
        }
        $firstDayInCurrentMonth = $date->startOfMonth()->__get('dayOfWeek');
        $daysInCurrentMonth = $date->__get('daysInMonth');

        return view('calendar', ['date' => $date,
                    'firstDay' => $firstDayInCurrentMonth,
                    'daysInMonth' => $daysInCurrentMonth,]);
    }

}
