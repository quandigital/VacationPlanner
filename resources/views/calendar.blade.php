
@extends('app')

@section('content')

    <table style="width:100%">

        <h3>Year: {{$date->__get('year')}}</h3>
        <h3>Month: {{$date->__get('month')}}</h3>

    </table>

@endsection

<a href="{{ action('PagesController@index', $date->subMonth()) }}"> prev </a>

<a href="{{ action('PagesController@index', $date->addMonths(2)) }}"> next </a>
