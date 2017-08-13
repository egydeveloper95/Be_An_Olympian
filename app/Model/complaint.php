<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class complaint extends Model
{
    //
     public $timestamps = false;
    protected $fillable = ['ComplaintId', 'UserID' , 'ComplaintSubject','ComplaintContent','Anwsered'
    ];
}
