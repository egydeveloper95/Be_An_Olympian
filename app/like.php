<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 3/23/2017
 * Time: 8:46 PM
 */

namespace app;
use Illuminate\Database\Eloquent\Model;


class like extends Model
{
    public $timestamps = false;
    protected $fillable = ['id' , 'user_id' , 'post_id'  ];
}









