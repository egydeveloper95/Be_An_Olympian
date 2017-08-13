<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class eventclub extends Model
{
    public $timestamps = false;
    protected $fillable = [ 'club_id' , 'event_id'  ];

}
?>