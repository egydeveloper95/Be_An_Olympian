<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;


class club extends Model
{
    public $timestamps = false;
    protected $fillable = ['ClubName' , 'city' , 'ClubDoCons' , 'Website' , 'password' ,'profilepicture' ,'mail' ];


}
