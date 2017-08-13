<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user extends Model
{
    //
    public $timestamps = false;
    protected $fillable = ['UserId', 'UserFirstName', 'UserLastName', 'AddressId', 'UserPhone', 'UserMail','UserGender', ' UserPassword','UserDOB', ' UserSSN', 'UserProfilePicture', 'UserActive', 'UserVerified', 'UserTypeId'
    ];

}



