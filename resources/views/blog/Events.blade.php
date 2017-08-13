@extends('layouts.postsLayOut')

@section('content')
<?php
$url=null;
$fname=null;
$lname=null;
if(session()->get('clubid')!=null)
{
$url='public/ClubPP/'.session()->get('profilepicture');
$id= session()->get('clubid' );
    $fname= session()->get('clubname' );        
}
else{
 $url='public/UserPP/'.session()->get('UserProfilePicture');
 $id=session()->get('userid');
                        $fname=session()->get('userfname');
                        $lname= session()->get('userlname');
  
}

?>
 <style>


        .wall .personalInfo .imageInfo .cover .img_up {
            width: 80px;
            height: 80px;
        background: url(<?php echo $url; ?>);
            background-size: cover;
            position: relative;
            left: 50%;
            top: 40%;
            transform: translate(-40px,0);
            border-radius: 50%;
            border:2px solid #fff
        }


    </style>
<br>
<div class="wall">
    <div class="container">
        <div class="row">
             <div class="personalInfo text-center col-lg-3">
                    <div class="imageInfo">
                        <div class="cover">
                            <div class="img_up"></div>
                        </div>

                        <div class="infos">
                            <h3>{{ $fname}} {{$lname}}</h3>

                        </div>
                        <hr>
                        <div class="update">
                            <a href="{{ url('/editProfile') }}">Update your Profile</a>
                        </div>
                    </div>
                </div>
                 <div class="col-lg-9">

                  <?php 
                  $Go="Going";
                  $No="Not Going";
                  ?>

        @foreach ($event as $key )
           
                <div class="Event--cap col-lg-12">
                    <div class="Event--img">
                            <!--  for each photo   -->
                       <img src="{{URL::to('public/event_image/'.(($key->Image)))}}"
                        alt="" >
                     </div>
                    <div class="Event--info">
                        <h4>{{$key->Event_name}}</h4>
                        <p><span class="glyphicon glyphicon-calendar"></span>&nbsp;{{$key->EventStartDate}} </p>
                        <p><span class="glyphicon glyphicon-calendar"></span>&nbsp;{{$key->EventEndDate}} </p>
                        <p class="showP" style="display: none;"><span class="glyphicon glyphicon-briefcase"></span>&nbsp; {{$key->EventDescription}}</p> 
                        <span class="sp" style="cursor: pointer;">Description </span><br>
                        @if (in_array($key->EventId, $eventid_all))
                         <button onclick="fun_checKEvent(event)"  
                         value="{{$key->EventId}}"
                          id="btnNotGoing{{$key->EventId}}"> 
                         {{$No}}</button>
                         @else
                         <button  onClick="fun_checKEvent(event)"
                         value="{{$key->EventId}}" id="btnGoing{{$key->EventId}}"> 
                         {{$Go}}</button>
                         @endIf

                    </div>
                </div>
                  
       @endforeach
<div class="clearfix"></div>
            </div>



        </div>
    </div>
</div>



@endsection

{!! Html::script('public/js/app.js') !!}
