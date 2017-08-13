<?php
/**
 * Created by PhpStorm.
 * User: Ahmed Esmail
 * Date: 07/03/2017
 * Time: 12:20 م
 */

namespace app;
use Illuminate\Database\Eloquent\Model;

class posttype extends Model
{ public $timestamps=false;
    protected $fillable=['PostTypeId','PostType'];

}



