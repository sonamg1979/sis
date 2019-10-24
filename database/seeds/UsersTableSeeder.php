<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.Carbon::now()->format('Y-m-d H:i:s'),
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'name' =>'Samuel Pradhan',
        	'email'=>'spradhan@trongsa.gov.bt',
        	'email_verified_at'=>Carbon::now()->format('Y-m-d H:i:s'),
        	'password'=>bcrypt('samuel'),
        	'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
        	'updated_at'=>Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
