<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;



class Event extends Model
{
    protected $table = 'events';
    protected $fillable = ['name_es', 'desc_es', 'name_eus', 'desc_eus', 'date', 'image', 'year'];
}
