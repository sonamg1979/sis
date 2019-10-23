<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //Table Name
    public $table='profiles';
    //Primary Key
    public $primaryKey='id';
    //Timestamps
    public $timestamps=true;
}
