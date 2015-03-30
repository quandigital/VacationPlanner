<?php

namespace database\seeds;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Yaml\Yaml;

class DaysTableSeeder extends Seeder {

    public function run()
    {
        for ($i = 0; $i<365; $i++) {
            $day = new Day();
            $day->date = Carbon::createFromDate(2015, 1, 1, null)->addDays($i);
            $day->weekday = $day->date->isWeekday();
            $day->save();
        }
    }

}