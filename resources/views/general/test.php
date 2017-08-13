<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use App\user;

class testingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('insert');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new  user;
        $user->UserFirstName=Input::get("name");
        $user->UserLastName="mano";
        $user->UserPhone=1;
        $user->AddressId=1;


        $user->UserMail=Input::get("email");
        $user->UserGender=Input::get("gender");
        $user->UserPassword=5;

        $user->UserSSN=5;
        $user->UserActive=1;
        $user->UserVerified="UserVerified";
        $user->UserTypeId=1;



        if(input::hasfile("image")){
            $files=Input::file('image');
            $name= time()."_".$files->getClientOriginalName();
            $image =  $files->move(public_path().'/images',$name);
            $user->UserProfilePicture=$name;



        }
        $user->save();
        return "saved in database";



    }



<!DOCTYPE html>
<html>
<head>
<title>insert</title>
</head>
<body>
<form action="store" method="post" enctype="multipart/form-data">
<label for="name">Name</label>
<input type="text" name="name" value="" id="name">
<br>
<input type="hidden" name="_token" value="{{csrf_token()}}">
<br>
<label for="email">Email</label>
<input type="text" name="email" value="" id="email">
<br>

<input type="radio" name="gender" value="male" >male

<input type="radio" name=gender"" value="female" >female
<br>
<input type="file" name="image">
<br>
<br>
<label for="submit">submit</label>
<input type="submit" name="submit" value="submit" id="submit">

</form>

</body>
</html>















    function showall()
    {
        $user= user::all();
        return view ("viewall" , compact('user'));
    }



    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
