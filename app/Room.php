<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{protected $fillable = [ 'floor', 'cnt_people'];
    public $timestamps = false;
}
