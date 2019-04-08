<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    //
    // Define a list of fields for automatic filling
    protected $fillable = array('name', 'images', 'filter');
}
