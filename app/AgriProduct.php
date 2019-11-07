<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AgriProduct extends Model
{
    //Table Name
    public $table='agriproducts';
    //Primary Key
    public $primaryKey='id';
    //Timestamps
    public $timestamps=true;
}
