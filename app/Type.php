<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    //Table Name
    public $table='construct_types';
    //Primary Key
    public $primaryKey='id';
    //Timestamps
    public $timestamps=true;
}
