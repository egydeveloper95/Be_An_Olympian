<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class following extends Model
{
    public $timestamps = false;
    protected $fillable = [ 'FollowerId' , 'FollowedId'  ];

}
?>