<?php
/**
 * Created by PhpStorm.
 * User: Ahmed Esmail
 * Date: 07/03/2017
 * Time: 12:45 م
 */

namespace app;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    public $timestamps = false;
    protected $table = 'posts';
    protected $fillable = [ 'PostDescription', 'postImage' , 'category_id', 'PostDisplayed', 'PostTypeID', 'UserId', 'category_id'];


    public function UserPost()
    {
        return $this->belongsTo('App\user','UserId','UserId');
    }


    public function clubPost()
    {
        return $this->belongsTo('App\club','UserId','ClubId');
    }

}


