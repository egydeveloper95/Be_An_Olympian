<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 3/17/2017
 * Time: 5:11 PM
 */

namespace app;
use Illuminate\Database\Eloquent\Model;


class invitation extends Model
{
    public $timestamps = false;
    protected $fillable = ['id', 'user_sender' , 'user_reciver','message' , 'answered' ,'sender_type' , 'reciever_type'
    ];
}





