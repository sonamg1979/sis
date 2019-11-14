<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class SectorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sector')->insert([
        	'sector' => 'Office of Dzongda',
        	'created_at' =>Carbon::now()->format('Y-m-d H:i:s'),
        	'updated_at' =>Carbon::now()->format('Y-m-d H:i:s'),

        ]);
        DB::table('sector')->insert([
        	'sector' => 'DYT Secretary',
        	'created_at' =>Carbon::now()->format('Y-m-d H:i:s'),
        	'updated_at' =>Carbon::now()->format('Y-m-d H:i:s'),

        ]);
        DB::table('sector')->insert([
        	'sector' => 'Agriculture',
        	'created_at' =>Carbon::now()->format('Y-m-d H:i:s'),
        	'updated_at' =>Carbon::now()->format('Y-m-d H:i:s'),

        ]);
        DB::table('sector')->insert([
        	'sector' => 'Livestock',
        	'created_at' =>Carbon::now()->format('Y-m-d H:i:s'),
        	'updated_at' =>Carbon::now()->format('Y-m-d H:i:s'),

        ]);
        DB::table('sector')->insert([
        	'sector' => 'Education',
        	'created_at' =>Carbon::now()->format('Y-m-d H:i:s'),
        	'updated_at' =>Carbon::now()->format('Y-m-d H:i:s'),

        ]);
        DB::table('sector')->insert([
        	'sector' => 'Health',
        	'created_at' =>Carbon::now()->format('Y-m-d H:i:s'),
        	'updated_at' =>Carbon::now()->format('Y-m-d H:i:s'),

        ]);
    }
}
