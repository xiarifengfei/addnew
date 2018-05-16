<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Appointment extends Model
{
    protected $fillable = ['cid', 'uid', 'stime'];
}
