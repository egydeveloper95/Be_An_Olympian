@extends('layouts.postsLayOut')

@section('content')
    <br>


    <style>

        

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
                            <h3></h3>
                            <p>Soft Skills: bla bla bla</p>
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
                                <th ><i class="fa fa-calendar-o" style="padding-right:10px"></i>From</th>
                                <th style="width:400px;"><i class="fa fa-edit" style="padding-right:10px"></i>Action</th>

                            </tr>
                        </thead>
                        
                        <tbody>

                           <tr>
                               <td>
                                   <img class="img_t" src="any" alt="">
                                   <span style="float:left">Person</span>
                               </td>
                               <td>
                                   <button class="btn btn-primary">Show Profile</button>
                               </td>
                           </tr>
                           
                            <tr>
                               <td>
                                   <img class="img_t" src="any" alt="">
                                   <span style="float:left">Person</span>
                               </td>
                               <td>
                                   <button class="btn btn-primary">Show Profile</button>
                               </td>
                           </tr>
                           
                            <tr>
                               <td>
                                   <img class="img_t" src="any" alt="">
                                   <span style="float:left">Person</span>
                               </td>
                               <td>
                                   <button class="btn btn-primary">Show Profile</button>
                               </td>
                           </tr>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
            

            

@endsection