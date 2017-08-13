<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class event extends Model
{

    public $timestamps = false;
    protected $table = 'event';
    protected $fillable = [ 'EventCreator','Event_name', 'UserId', 'EventDescription', 'EventStartDate', 'EventEndDate', 'AddresId', 'EventTypeID', 'EventStatus' ];

    public function UserEvent()
    {
        return $this->belongsTo('App\user','UserId','UserId');
    }
        public function ClubEvent()
    {
        return $this->belongsTo('App\club','UserId','ClubId');
    }

}
?>
