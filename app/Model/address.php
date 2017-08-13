<?php
/**
 * Created by PhpStorm.
 * User: Ahmed Esmail
 * Date: 27/02/2017
 * Time: 05:44 م
 */

namespace App\Model;

use Illuminate\Database\Eloquent\Model;


class address extends Model
{
    public $timestamps = false;
    protected $fillable = ['AddressId', 'AddressStratName' , 'CityId'
    ];
}













