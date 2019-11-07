<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    //Table Name
    public $table='status';
    //Primary Key
    public $primaryKey='id';
    public $keyType = 'string';
    //Timestamps
    public $timestamps=true;
}
