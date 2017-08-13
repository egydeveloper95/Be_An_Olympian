<?php
/**
 * Created by PhpStorm.
 * User: Ahmed Esmail
 * Date: 27/02/2017
 * Time: 11:15 ص
 */

namespace app;
namespace app;
use Illuminate\Database\Eloquent\Model;


class city  extends Model
{
    public $timestamps = false;
    protected $fillable = ['CityId', 'CityName' , 'GovernateId'
    ];
}








