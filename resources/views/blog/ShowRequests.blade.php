@extends('layouts.postsLayOut')

@section('content')
    <br>
    <?php if(session()->has('userid')) { ?>

    <style>


        .wall .personalInfo .imageInfo .cover .img_up {
            width: 80px;
            height: 80px;
            background: url("{{URL::to('public/UserPP/'.((session()->get('UserProfilePicture'))))}}");
            background-size: cover;
            position: relative;
            left: 50%;
            top: 40%;
            transform: translate(-40px, 0);
            border-radius: 50%;
            border: 2px solid #fff
        }


    </style>



    <div class="wall">
        <div class="container">
            <div class="row">
                <div class="personalInfo text-center col-lg-3">
                    <div class="imageInfo">
                        <div class="cover">
                            <div class="img_up"></div>
                        </div>

                        <div class="infos">
                            <h3> {{session()->get('userfname')}} {{session()->get('userlname')}} </h3>
                        </div>
                        <hr>
                        <div class="update">
                            <a href="{{ url('/editProfile') }}">Update your Profile</a>
                        </div>

                    </div>
                </div>
                <div class="col-lg-9">
                    <table class="table" style="background:#fff;color:#000">
                        <thead>
                        <tr style="background:#283e4a;color:#fff;">
                            <th><i class="fa fa-calendar-o" style="padding-right:10px"></i>From</th>
                            <th style="width:400px;"><i class="fa fa-edit" style="padding-right:10px"></i>Action</th>

                        </tr>
                        </thead>


                        <tbody>
                        <?php
                        foreach ($requests as $request){
                        $user_data = \App\Http\Controllers\PersonController::GetUserById($request->sender_id);

                        ?>
                        <tr>
                            <td>
                                <img class="img_t"
                                     src="{{URL::to('public/UserPP/'.(($user_data->UserProfilePicture)))}}" alt="">
                                <span style="float:left">{{$user_data->UserFirstName}} {{$user_data->UserLastName}}</span>
                            </td>
                            <td id="td{{$user_data->UserId}}">
                                <button class=" AcceptRequest btn btn-success" data-id="{{$user_data->UserId}}">Accept
                                </button>
                                <button class=" RefuseRequest btn btn-danger" data-id="{{$user_data->UserId}}">Refuse
                                </button>
                            </td>
                        </tr>
                        <?php   }}
                        elseif(session()->has('clubid')) { ?>

                        <style>


                            .wall .personalInfo .imageInfo .cover .img_up {
                                width: 80px;
                                height: 80px;
                                background: url("{{URL::to('public/ClubPP/'.((session()->get('profilepicture'))))}}");
                                background-size: cover;
                                position: relative;
                                left: 50%;
                                top: 40%;
                                transform: translate(-40px, 0);
                                border-radius: 50%;
                                border: 2px solid #fff
                            }


                        </style>



                        <div class="wall">
                            <div class="container">
                                <div class="row">
                                    <div class="personalInfo text-center col-lg-3">
                                        <div class="imageInfo">
                                            <div class="cover">
                                                <div class="img_up"></div>
                                            </div>

                                            <div class="infos">
                                                <h3> {{session()->get('clubname')}}  </h3>
                                            </div>
                                            <hr>
                                            <div class="update">
                                                <a href="{{ url('/editProfile') }}">Update your Profile</a>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-9">
                                        <table class="table" style="background:#fff;color:#000">
                                            <thead>
                                            <tr style="background:#283e4a;color:#fff;">
                                                <th><i class="fa fa-calendar-o" style="padding-right:10px"></i>From</th>
                                                <th style="width:400px;"><i class="fa fa-edit" style="padding-right:10px"></i>Action</th>

                                            </tr>
                                            </thead>


                                            <tbody>
                                            <?php
                                            foreach ($requests_club as $request_club){
                                            $user_data = \App\Http\Controllers\PersonController::GetUserById($request_club->sender_id);

                                            ?>
                                            <tr>
                                                <td>
                                                    <img class="img_t"
                                                         src="{{URL::to('public/UserPP/'.(($user_data->UserProfilePicture)))}}" alt="">
                                                    <span style="float:left">{{$user_data->UserFirstName}} {{$user_data->UserLastName}}</span>
                                                </td>
                                                <td id="td{{$user_data->UserId}}">
                                                    <button class=" AcceptRequestClub btn btn-success" data-id="{{$user_data->UserId}}">Accept
                                                    </button>
                                                    <button class=" RefuseRequestClub btn btn-danger" data-id="{{$user_data->UserId}}">Refuse
                                                    </button>
                                                </td>
                                            </tr>
                                            <?php   }}
                                            ?>


                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>




@endsection