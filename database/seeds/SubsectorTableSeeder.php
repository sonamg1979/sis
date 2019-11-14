<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class SubsectorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subsector')->insert([
        	'subsector' => 'Secretariat',
        	'sector_id' => '1',
        	 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('subsector')->insert([
        	'subsector' => 'Legal Unit',
        	'sector_id' => '1',
        	 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('subsector')->insert([
        	'subsector' => 'Land Sector',
        	'sector_id' => '1',
        	 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('subsector')->insert([
        	'subsector' => 'Statistics',
        	'sector_id' => '1',
        	 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('subsector')->insert([
        	'subsector' => 'Engineering',
        	'sector_id' => '1',
        	 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('subsector')->insert([
        	'subsector' => 'Environment',
        	'sector_id' => '1',
        	 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('subsector')->insert([
        	'subsector' => 'HR',
        	'sector_id' => '1',
        	 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
