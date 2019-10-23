<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class YearsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('years')->insert([
        	'year' => '2018',
        	'f_year' =>'2018-2019',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
         DB::table('years')->insert([
        	'year' => '2019',
        	'f_year' =>'2019-2020',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
