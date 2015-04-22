<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Calendar\Calendar;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use App\User;
use App\Holiday;
use Auth;

class PagesController extends Controller {

    /**
     * display a month including registered
     * holidays of the logged in user
     *
     * @param null $date
     * @return \Illuminate\View
     */

    public function index($date = null)
    {   if (!Auth::user()) {
            return view('auth.login');
        }
        if (is_null($date)) {
            $date = Carbon::now();
        }
        else {
            $date = Carbon::parse($date);
        }
        $user = Auth::user();
        $currentMonth = $date->month;
        if ($currentMonth<10) {
            $currentMonth = '0'.$currentMonth;
        }
        $holidays = $user->holidays()->where('date', 'like', '%'.'-'.$currentMonth.'-'.'%')->get()->toArray();
        $month = [];
        foreach ($holidays as $holiday) {
            $month[date("j",strtotime($holiday['date']))] = $holiday;
        }
        //return var_dump($holidays);
        //return var_dump($month);
        return view('calendar')->with('date', $date)->with('month', $month)->with('user', $user);
    }


    /**
     * store a holiday in the database
     *
     * @param Request $request
     * @return Response
     */

    public function store(Request $request)
    {
        $user = Auth::user();
        $dayOfMonth = $request->get('dayOfMonth');
        $year = $request->get('year');
        $month = $request->get('month');
        $holiday = new Holiday();
        $holiday->date = $year.'-'.$month.'-'.$dayOfMonth;
        $user->holidays()->save($holiday);
        $user->holidays_available = $user->holidays_available - 1;
        $user->save();

        return response()->json(['counter' => $user->holidays_available]);
    }

    /**
     * delete a holiday from the database
     *
     * @param Request $request
     * @return Response
     */
    public function destroy(Request $request)
    {
        $user = Auth::user();
        $year = $request->get('year');
        $month = $request->get('month');
        $dayOfMonth = $request->get('dayOfMonth');
        $user->holidays()->where('date', '=', $year.'-'.$month.'-'.$dayOfMonth)->delete();
        $user->holidays_available = $user->holidays_available + 1;
        $user->save();

        return response()->json(['counter' => $user->holidays_available]);
    }


}
