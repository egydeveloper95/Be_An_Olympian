@extends('layouts.postsLayOut')

@section('content')
<!-- begin the wall section --><br><br>

 <style>

        img{
            border-radius: 50%;
        }

        .wall .personalInfo .imageInfo .cover .img_up {
            width: 80px;
            height: 80px;
            background: url("{{URL::to('public/UserPP/'.((session()->get('UserProfilePicture'))))}}");
            background-size: cover;
            position: relative;
            left: 50%;
            top: 40%;
            transform: translate(-40px,0);
            border-radius: 50%;
            border:2px solid #fff
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
                            <h3>{{session()->get('userfname')}} {{session()->get('userlname')}}</h3>

                        </div>
                        <hr>
                        <div class="update">
                            <a href="{{ url('/editProfile') }}">Update your Profile</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-9">
                <?php 
                  $Go="Follow";
                  $No="Unfollow";
                  ?>
                    @foreach ($clubs as $key )
                        <div class=" col-lg-6">
                            <div class="border-box">
                            <img height="200" width="30" style="border-radius:0"src="{{URL::to('public/ClubPP/'.(($key->profilepicture)))}}"/>
                                
                                <div class="event-box">
                                    <h3 style="font-size:22px" name="clubname">{{$key->ClubName}}</h3>
                                    <p class="event-day"><strong>13</strong><br>AUG</p>
                                    <span>08:00 AM</span><br>
                                    <span>Fitness Center</span>
                                    <p class="event-info">Nor again is there anyone who loves or pursues or desires to obtain pain of itself       because it is pain.</p>
                                     @if (in_array($key->ClubId, $clubfollower_all))
                                         <button onclick="fun_checkClub(event)" value="{{$key->ClubId}}"
                                          id="btnUnfollow{{$key->ClubId}}"> 
                                         {{$No}}</button>
                                         @else
                                         <button  onClick="fun_checkClub(event)"
                                         value="{{$key->ClubId}}" id="btnFollow{{$key->ClubId}}"> 
                                         {{$Go}}</button>
                                         @endIf
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

        </div>
    </div>
</div>
{!! Html::script('public/js/app.js') !!}




@endsection
<!-- btnUnfollow-{{$key->ClubId}} -->