<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;



class MasterKey extends Model
{
    protected $table = 'master_key';
    protected $fillable = ['master_key', 'tried'];
}
