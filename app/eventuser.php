<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class eventuser extends Model
{
    public $timestamps = false;
    protected $fillable = [ 'user_id' , 'event_id'  ];

}
?>