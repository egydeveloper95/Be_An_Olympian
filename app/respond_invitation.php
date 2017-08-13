<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 3/17/2017
 * Time: 5:11 PM
 */

namespace app;
use Illuminate\Database\Eloquent\Model;


class respond_invitation extends Model
{
    public $timestamps = false;
    protected $fillable = ['id', 'question_id' , 'user_sender','user_reciver' , 'message' , 'answered'
    ];
}





