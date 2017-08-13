<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class subscriber extends Model
{
	public $timestamps=false;
	protected $fillable=['ID','SubscriberMail'];
}