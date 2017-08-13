<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class trainrequest extends Model
{
    //
    public $timestamps = false;
    protected $fillable = ['id','sender_id', 'receiver_id', 'status'];
}
