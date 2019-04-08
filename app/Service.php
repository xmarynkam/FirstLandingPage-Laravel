<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    // Define a list of fields for automatic filling
    protected $fillable = array('name', 'text', 'icon');
}
