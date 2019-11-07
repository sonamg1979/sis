<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fencing extends Model
{
    //Table Name
    public $table='fencing_type';
    //Primary Key
    public $primaryKey='id';
    //Timestamps
    public $timestamps=true;
}
