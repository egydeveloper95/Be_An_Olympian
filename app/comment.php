<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 3/23/2017
 * Time: 6:01 PM
 */

namespace app;
use Illuminate\Database\Eloquent\Model;


class comment extends Model
{public $timestamps = false;
    protected $fillable = ['CommentId' , 'PostID' , 'Content' , 'UserId' ,'time' , 'ClubId' ];

    public function Usercomment()
    {
        return $this->belongsTo('App\user','UserId','UserId');
    }

    public function clubcomment()
    {
        return $this->belongsTo('App\club','ClubId','ClubId');
    }
}






