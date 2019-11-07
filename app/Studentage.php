<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Studentage extends Model
{
    //Table Name
    public $table='student_ages';
    //Primary Key
    public $primaryKey='id';
    //Timestamps
    public $timestamps=true;
}
