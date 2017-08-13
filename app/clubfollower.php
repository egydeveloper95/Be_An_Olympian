<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class clubfollower extends Model
{
    public $timestamps = false;
    protected $fillable = [ 'User_Id' , 'Club_Id'  ];
public function user()
{
    return $this->belongsTo('App\user');
}
public function club()
{
    return $this->belongTo('App\club');
}

}
?>