<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class club extends Model
{
    public $timestamps = false;
    protected $fillable = [	'ClubId' , 'ClubName' , 'city' , 'ClubDoCons' , 'Website' , 'password' ,'profilepicture' ,'mail' ];


}
