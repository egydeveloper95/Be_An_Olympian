<?php
/**
 * Created by PhpStorm.
 * User: Ahmed Esmail
 * Date: 07/03/2017
 * Time: 10:46 ص
 */

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class categorytype extends Model
{
    public $timestamps = false;
    protected $fillable = ['CategoryTypeID', 'CategoryTypeName'
    ];
}











