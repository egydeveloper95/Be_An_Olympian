@extends('layouts.postsLayOut')

@section('content')


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

<br><br>
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
                        <p>Soft Skills: bla bla bla</p>
                    </div>
                    <hr>
                    <div class="update">
                        <a href="{{ url('/editProfile') }}">Update your Profile</a>
                    </div>
                   
                </div>
            </div>




            <form  action="#"  method="POST" autocomplete="on" id="create-post" enctype="multipart/form-data">
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="postsInfo col-lg-6">
                    <div class="post">
                        <div class="postHead">
                            <div class="postHead--img"> 
                               <img height="50" src="{{URL::to('public/UserPP/'.((session()->get('UserProfilePicture'))))}}">                             
                            </div>
                            <div class="postHead--info">
                                <h5>{{session()->get('userfname')}} {{session()->get('userlname')}}</h5>
                                <p>Soft Skills : Web Designer | Public speaking | Leadership | Time Management | Coach : Web Designer  </p>
                            </div>
                            <div class="clearfix"></div>

                            <div class="postHead--post">
                                <textarea id="PostDescription" name="PostDescription" cols="60" rows="8" placeholder="Write your post here...." ></textarea>
                            </div>
                            <hr>


                            <div class="postHead--footer">
                               <div class="img_upload update_post">
                                    <label><i class="fa fa-calendar-o" style="padding-right:10px"></i>Update Share</label>
                                </div>
                                <div class="Event">
                                  <a href="#" id="ClickEvent"> create Event</a> 
                                </div>
                                <div class="category_button">
                                    <div class="categoty">
                                    
                                    </div>
                                    <div class="btnn">
                                      <input type="submit" value="submit" class="crud-submit btn btn-info" 
                                      style="height: 31px;border-radius: 9px;border: none;background: #ff6633;"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                 </div>
            </form>
        </div>
    </div>
</div>

<div class="wall">
    <div class="container TheEvent">
        <div class="formEvent">
            <div class="imageEvent">
                <img src="HereImg" alt="">
            </div>
            <div class="infoForm">
                <form>
                    <label>Event Title</label><br>
                    <input type="text" placeholder="title...">
                    <label>Event Type</label><br>
                    <input type="text" placeholder="title...">
                </form>
            </div>
            <form class="nForm">
                <label>Description</label><br>
                <textarea cols="15" rows="4" placeholder="The Desc...."></textarea>
                
                <div class="row">
                    <div class="col-lg-6">
                        <label>Start Time</label><br>
                        <input type="datetime-local"><br><br>
                    </div>
                    <div class="col-lg-6">
                        <label>End Time</label><br>
                        <input type="datetime-local"><br>
                    </div>
                </div>
                
                <label>Location</label><br>
                <input type="text" placeholder="Location......." class="loc">
                <br><br>
                <div class="row">
                    <div class="col-lg-6">
                        <label>Hosted By</label><br>
                        <input type="text" placeholder="hosted by...." class="loc"><br><br>
                    </div>
                    <div class="col-lg-6">
                        <label>Status</label><br>
                        <input type="text" placeholder="status" class="loc"><br>
                    </div>
                </div>
                
                <input type="submit" value="Create Event" style="float:right; background:#f63" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>

<div class="ThePostsHere wall">
    <div class="container">
        <div class="postsInfo TheNewPost">
            <div class="post post-n">
                <div class="postHead">
                    <div class="postHead--img">

                    <img height="50" src="">
                    </div>
                    <div class="postHead--info">
                        <h5>Name</h5>
                        <p>Time</p>
                    </div>
                    <div class="clearfix"></div>
                    <br>
                    <div class="postHead--post">
                        <img class="event" src="https://fb-s-a-a.akamaihd.net/h-ak-xfl1/v/t1.0-0/p160x160/16143105_105750806604362_4644995145804659055_n.jpg?oh=32b43ce82a637487a364ba520489f857&oe=59665767&__gda__=1500747584_5a163b2c42157d5b3b962537e143aa4c" alt="">
                        <div class="event--info">
                            <p>The Name of Event </p>
                            <p>Time of Event</p>
                            <button class="btn btn-primary" style="background:#283e4a;border:0">Going</button>
                            <button class="btn btn-primary" style="background:#283e4a;border:0">Ignore</button>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="postHead--footer">
                        <span><i class="fa fa-thumbs-up"></i><a href="#">Like</a></span>
                        <span><i class="fa fa-comment"></i><a href="#">Comment</a></span>
                        <span><i class="fa fa-share-alt"></i><a href="#">Share</a></span>
                    </div>
                </div>
            </div>
        </div>



    </div>
</div>


@endsection