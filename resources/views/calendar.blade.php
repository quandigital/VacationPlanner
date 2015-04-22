
@extends('app')

@section('content')

    <link href="/css/calendar.css" rel="stylesheet">

    <div class="year">{{$date->year}}</div>
    <div class="month">{{$date->month}}</div>
    <div class="counter">Available Days:
        <div class="availableHolidays">{{$user->holidays_available}}</div>
    </div>
    @for($i = 1; $i <= $date->daysInMonth; $i++)
        @if(array_key_exists($i, $month))
            <div class="day highlighted">
                @else
                    <div class="day">
                        @endif
                        <div class="dayOfMonth">{{$i}}</div>
                    </div>
                    @endfor
                    @endsection

                    <a href="{{ action('PagesController@index', $date->subMonth()) }}"> prev </a>

                    <a href="{{ action('PagesController@index', $date->addMonths(2)) }}"> next </a>

