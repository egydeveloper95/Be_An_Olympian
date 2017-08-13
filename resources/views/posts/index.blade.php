@extends('layouts.postsLayOut')

@section('content')
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

    <br><br>
    <div class="wall">
        <div class="container">
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
                        @if($id == session()->get('userid'))
                            <a href="{{ url('/editProfile') }}">Update your Profile</a>
                            @endIf
                    </div>

                </div>
            </div>
        <?php } ?>
            <?php if(session()->has('clubid')) { ?>
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

            <br><br>
            <div class="wall">
                <div class="container">
                    <div class="personalInfo text-center col-lg-3">
                        <div class="imageInfo">
                            <div class="cover">
                                <div class="img_up"></div>
                            </div>

                            <div class="infos">
                                <h3>{{session()->get('clubname')}}</h3>

                            </div>
                            <hr>
                            <div class="update">
                                <a href="{{ url('/editProfile') }}">Update your Profile</a>
                            </div>

                        </div>
                    </div>
                <?php } ?>

                <!--  ====================<< start form posts >>========================= -->

                <div class="col-lg-6">

                    <form  action="#"  method="POST" autocomplete="on" id="create-post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="postsInfo">
                            <div class="post">

                                <div class="postHead">

                                    <div class="postHead--img">


                                        <img height="50" src="{{URL::to(($url))}}">
                                    </div>
                                    <div class="postHead--info">
                                        <h5>{{$fName}} {{$lName}}</h5>
                                        <p>Soft Skills : Web Designer | Public speaking | Leadership | Time Management | Coach : Web Designer  </p>
                                    </div>
                                    <div class="clearfix"></div>


                                    <hr style="margin-bottom:0">

                                    @if($id == session()->get('userid') || $id == session()->get('clubid'))


                                        <div class="postHead--footer">
                                            <div class="img_upload update_post">
                                                <label>Update Status</label>
                                            </div>
                                            <div class="Event">
                                                <a href="#" id="ClickEvent"> create Event</a>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="showingPost">
                                                <div class="postHead--post">
                                                    <textarea required id="PostDescription"  name="PostDescription" cols="20" rows="10" placeholder="Write your post here...." ></textarea>
                                                </div>
                                                <div class="img_upload"><br>
                                                    <input type="file" name="image" id="postImage" accept="image/*,video/*"  />
                                                </div>

                                                <div class="category_button">
                                                    <div class="categoty">
                                                        {{ Form::select('category_id', $Categorytype) }}
                                                    </div>
                                                    <div class="btnn">
                                                        <input type="submit" onclick="createPost()" value="submit" class="crud-submit btn btn-info" style="height: 36px;border: none;background: #ff6633;"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endIf


                                </div>
                            </div>
                        </div>
                    </form>

                    <!--  =========================<< end form posts >>================================= -->

                    <!--  ======================<< start form events >>============================================== -->


                    <div class="clearfix"></div>

                    <div class="wall">
                        <div class="TheEvent">
                            <div class="formEvent">
                                <div class="infoForm row">
                                    <form action="#"  method="POST" autocomplete="on" id="create-event" enctype="multipart/form-data">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <div class="col-lg-6">
                                            <input required type="text" id="Event_name"  name ="Event_name" style="height:35px; border:1px solid #f63" placeholder="title..." >
                                        </div>
                                        <div class="col-lg-6">

                                            {{ Form::select('EventTypeId', $eventType , null , array('class' => 'form-control' , 'style' => 'border:1px solid #c5c5c5 ; height : 35px;border:1px solid #f63; width:259px')) }}

                                        </div>
                                </div>

                                <div class="clearfix"></div>
                                <textarea required class="form-control" cols="15" id="EventDescription" name="EventDescription" rows="4" placeholder="The Desc...." style="border:1px solid #f63" ></textarea><br>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <input type="date" required name="EventStartDate" id="EventStartDate" style="width:100%;border:1px solid #f63"><br><br>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="date" required name="EventEndDate" id="EventEndDate" style="width:100%;border:1px solid #f63"><br>
                                    </div>
                                </div>
                                <br><br>
                                <input type="file" required name="image" id="image" style="float: left">
                                <input type="submit" value="Create Event"  onclick="create_Event()" style="float:right; background:#f63" class="btn btn-primary">
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--  =========================================<< end form events >>========================================================= -->

                    <!-- ==========================================<< start posts retrival >>==================================================== -->

                    <div class="ThePostsHere wall" id="currentPost">
                        <!-- <div id="currentPost"> -->
                        @foreach($posts as $post)
                            <?php
                            $Go="Like";
                            $No="Dislike";
                            ?>
                            <div class="postsInfo"  id="RemovePost_{{$post->id}}">
                                <div class="post">
                                    <div class="postHead">
                                        <div class="postHead--img">
                                            @if($post->postwritertype==1)

                                                <img height="50" src="{{URL::to('public/UserPP/'.($post->UserPost->UserProfilePicture))}}" style="border-radius:50%;">
                                        </div>
                                        <div class="postHead--info">

                                            <h5>{{ $post->UserPost->UserFirstName }} {{ $post->UserPost->UserLastName }}</h5>
                                            @elseif($post->postwritertype==2)
                                                <img height="50" src="{{URL::to('public/ClubPP/'.($post->clubPost->profilepicture))}}" style="border-radius:50%;">
                                        </div>
                                        <div class="postHead--info">
                                            <h5>{{ $post->clubPost->ClubName }} </h5>
                                            @endif


                                            <p>{{ $post->PostDateTime }}</p>

                                            <div class="dropdown drop" style="margin-left: 425px;margin-top: -45px;">
                                                <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" style="border: 0px">
                                                    <span class="glyphicon glyphicon-chevron-down"></span></button>
                                                <ul class="dropdown-menu">

                                                    @if( $id != $post->UserId)

                                                        <li><a id="report-modal" data-id="{{$post->id}}" href="#" data-toggle="modal" data-target="#myModal" >Report</a></li>
                                                    @endif
                                                        @if( $id == $post->UserId)

                                                            <li><a href="#" onclick="return RemovePost({{ $post->id }})">Delete</a></li>
                                                        @endif


                                                        @if(session()->has('clubid'))
                                                            @if(  $post->UserId== session()->get('clubid') )
                                                                <li><a href="#" onclick="return RemovePost({{ $post->id }})">Delete</a></li>

                                                            @endif
                                                        @endif
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="postHead--post">
                                            <p>{{ $post->PostDescription }}</p>
                                            @if( strpos($post->postImage , '.avi') !== false OR strpos($post->postImage , '.mp4') !== false OR strpos($post->postImage , '.flv') !== false OR strpos($post->postImage , '.mpg') !== false  )
                                                <video controls>
                                                    <source src="{{URl::to('public/post_image/'.($post->postImage)) }}" type="video/mp4">
                                                </video>
                                            @elseif($post->postImage)


                                                <center><img src="{{URL::to('public/post_image/'.($post->postImage)) }}" style="max-width:550px; max-height: 400px;border: 2px solid #f63;padding: 8px;box-shadow: 2px 2px 10px #000; margin-top:2%;" class="img-responsive"></center>

                                            @endif

                                        </div>
                                        <hr>
                                        <div class="postHead--footer">

                                            <?php $like_count = DB::table('likes')->where('post_id', '=',$post->id)->count();

                                            ?>

                                            @if(session()->get('userid')!=null)

                                                <?php $liked = DB::table('likes')->where('post_id', '=',$post->id)->where('liker_type', '=',1)->where('user_id', '=',session()->get('userid'))->first();

                                                ?>
                                                @endIf

                                                @if(session()->get('clubid')!=null)

                                                    <?php $liked = DB::table('likes')->where('post_id', '=',$post->id)->where('liker_type', '=',2)->where('user_id', '=',session()->get('clubid'))->first();

                                                    ?>
                                                    @endIf



                                                    @if ($liked)
                                                        <button  onclick="fun_checklike(event)"
                                                                 value="{{$post->id}}"
                                                                 id="btnUnfollow{{$post->id}}" class="li_un">

                                                            <i class="fa fa-thumbs-down "></i>
                                                            {{$No}}</button>
                                                    @else
                                                        <button  onClick="fun_checklike(event)"
                                                                 value="{{$post->id}}" id="btnFollow{{$post->id}}" class="li_un">

                                                            <i class="fa fa-thumbs-up"></i>
                                                            {{$Go}}</button>
                                                        @endIf



                                                        </i><button class="li_un" aria-controls="#view-comments-{{$post->id}}"  type="button" data-target="#view-comments-{{$post->id}}" data-toggle="collapse" aria-expanded="false" >
                                                            <i class="fa fa-comment"> &nbsp;Show Comments


                                                            </i> </button>
                                                        <span><i class="fa fa-share-alt"></i><a href="#" data-toggle="modal" data-target="#myModal2">Share</a></span>




                                        </div>

                                        <?php
                                        $iscomment = App\comment::with('UserComment')->where('PostID', '=',$post->id)->orderBy('time', 'DESC')->get();


                                        ?>


                                        @if($id == session()->get('userid') || $id == session()->get('clubid') )
                                        <form  action="#"  method="POST" autocomplete="on" id="create-comment-{{$post->id}}" enctype="multipart/form-data">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" name="PostID" id="PostID" value="{{$post->id}}">
                                            <textarea required id="commentDescription" class="form-control text_comment"  name="commentDescription" cols="30" rows="1" placeholder="Write your comment here...." style="outline:0;border:1px solid #f63"></textarea>

                                            <input type="submit" onclick="return createcomment({{ $post->id }})" value="Add comment" class="crud-submit btn btn-info btn-block" id="CommentButton"
                                                   style=" margin-bottom:1%;height: 36px;border: none;margin-top:2%; background:#f63 "/>

                                        </form>
                                    @endif

                                        <!-- Mano Work Will be run when user log in
                                        not run when club login -->
                                        <div class="clearfix"></div>
                                        <div class="collapse com" id="view-comments-{{$post->id}}" style="padding-bottom:1%; padding-top:1%;overflow:hidden">



                                            @foreach($iscomment as $comment)

                                                @if($comment->UserId !=null)

                                                    <div class="TheComments">
                                                        <div class="left_info left_info--com">
                                                            <div class="img_name">
                                                                <img src="{{URL::to('/public/UserPP/'.$comment->Usercomment->UserProfilePicture)}}" alt="" width="70px"
                                                                     height="50px">

                                                            </div>
                                                            <p>{{$comment->Usercomment->UserFirstName}}   {{$comment->Usercomment->UserLastName}}</p>

                                                        </div>

                                                        <div class="right_info" style="margin-top:5px">

                                                            {{$comment->Content}}


                                                        </div>
                                                    </div>

                                                    <div class="clearfix"></div>
                                                @endif

                                                @if($comment->ClubId !=null)


                                                    <div class="TheComments">
                                                        <div class="left_info left_info--com">
                                                            <div class="img_name">
                                                                <img src="{{URL::to('/public/ClubPP/'.$comment->clubcomment->profilepicture)}}" alt="" width="70px"
                                                                     height="50px">

                                                            </div>
                                                            <p>{{$comment->clubcomment->ClubName}}  </p>

                                                        </div>

                                                        <div class="right_info" style="margin-top:5px">

                                                            {{$comment->Content}}


                                                        </div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                @endif


                                            @endforeach


                                        </div>
                                    </div>
                                </div>
                            </div>
                    @endforeach
                    <!-- </div> -->
                    </div>

                    <!--  ==========================================<< end posts retrival >>============================================== -->

                    <!-- The Model For Reporting Any Post ===================================-->
                    <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content" style="padding:15px; ">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Tell Us What's Going On ?</h4>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <input type="hidden" class="form-control" id="pid" disabled>
                                        {{ Form::select('ReportTypeId', $reporttype ,  null, array('class'=>'form-control','style'=>'' ) , array('id'=>'ReportTypeId'))  }}



                                    </form>
                                </div>
                                <div class="modal-footer7" style="text-align: right; ">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button id="savebutton" type="button" class="btn btn-primary" data-dismiss="modal" style="margin-right:15px;">Save</button>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- The Model For Sharing Any Post ===================================-->
                    <div class="modal fade" id="myModal2" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Share To Feed</h4>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <textarea required cols="40" placeholder="Say Something...." rows="5" style="width:100%;outline:0;border:0; resize:none"></textarea>
                                        <hr>
                                        <!-- Content of Post -->
                                        The Content of sharing Post
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Saving</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


                <!-- Connect People  >>============================================== -->
                @if($id == session()->get('userid'))



                    @if(session()->get('userid')!=null)
                        <?php
                        $user_intrest = DB::table('users')
                            ->where('UserId', $id)->first();
                        $users_connect = DB::table('users')
                            ->where('intrest', $user_intrest->intrest)->where('UserId', '!=',$id)->get();

                        ?>





                        <div class="col-lg-3">
                            <div class="connect_people">
                                <p>
                                    <span class="glyphicon glyphicon-user"></span> People to Connet
                                </p>
                                <hr>
                                <?php
                                $Go="Follow";
                                $No="Unfollow"; ?>

                                @foreach ($users_connect as $user_connect )





                                    <div class="peoples--connect">

                                        <div class="info--people">
                                            <img src="{{URL::to('/public/UserPP/'.$user_connect->UserProfilePicture)}}" alt="" width="70px">


                                            <div class="Connet_info">
                                                <h4>{{$user_connect->UserFirstName}}  </h4>

                                            </div>
                                        </div>



                                        @if (in_array($user_connect->UserId, $followerid_all))
                                            <button class="btn btn-info" onclick="fun_checkFollower(event)"
                                                    value="{{$user_connect->UserId}}"
                                                    id="btnUnfollow{{$user_connect->UserId}}" style="background:#f63;border:0"> 
                                                {{$No}}</button>
                                        @else
                                            <button class="btn btn-info" onClick="fun_checkFollower(event)"
                                                    value="{{$user_connect->UserId}}" id="btnFollow{{$user_connect->UserId}}" style="background:#f63;border:0">
                                                {{$Go}}</button>
                                            @endIf
                                    </div>
                                @endforeach



                            </div>
                        </div>
                @endif
                @endIf

                <!-- End Connect People ============================================== -->
            </div>
        </div>
    </div>
@endsection
{!! Html::script('public/js/app.js') !!}

