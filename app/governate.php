<?php
/**
 * Created by PhpStorm.
 * User: Ahmed Esmail
 * Date: 27/02/2017
 * Time: 11:12 ص
 */

namespace app;
use Illuminate\Database\Eloquent\Model;


class governate extends Model
{
    public $timestamps = false;
    protected $fillable = ['GovernateId', 'GovernateName'
    ];
}



