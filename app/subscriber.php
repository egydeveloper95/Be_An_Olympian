<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class subscriber extends Model
{
	public $timestamps=false;
	protected $fillable=['ID','SubscriberMail'];
}