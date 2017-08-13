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
    <!-- begin the wall section --><br><br>
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
                                <div class="postHead--img"> <img height="50" src="{{URL::to('public/UserPP/'.((session()->get('UserProfilePicture'))))}}"></div>
                                <div class="postHead--info">
                                    <h5>{{session()->get('userfname')}} {{session()->get('userlname')}}</h5>
                                    <p>Soft Skills : Web Designer | Public speaking | Leadership | Time Management | Coach : Web Designer  </p>
                                </div>
                                <div class="clearfix"></div>

                                <div class="postHead--post">
                                    <textarea id="PostDescription" name="PostDescription" cols="60" rows="8" placeholder="Write your post here...." required></textarea>
                                </div>
                                <hr>


                                <div class="postHead--footer">
                                    <div class="img_upload">
                                        <input type="file" name="image"  />
                                    </div>
                                    <div class="category_button">
                                        <div class="categoty">
                                            {{ Form::select('category_id', $Categorytype) }}
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
            </div>
        </div>
    </div>
    </form>



    </div>
    </div>
    </div>




    <div class="ThePostsHere wall">
        <div class="container" id="currentPost">

            @foreach($posts as $post)
                <div class="postsInfo TheNewPost">
                    <div class="post">
                        <div class="postHead">
                            <div class="postHead--img">
                                <img height="50" src="{{URL::to('public/UserPP/'.((session()->get('UserProfilePicture'))))}}">
                            </div>
                            <div class="postHead--info">
                                <h5>{{ $post->UserPost->UserFirstName }} {{ $post->UserPost->UserLastName }}</h5>
                                <p>{{ $post->PostDateTime }}</p>
                            </div>
                            <div class="clearfix"></div>
                            <div class="postHead--post">
                                <p>{{ $post->PostDescription }}</p>
                                @if($post->postImage)
                                    <center><img src="public/post_image/{{ $post->postImage }}" style="width:400px; height: 400px;"></center>@endif
                            </div>
                            <hr>
                            <div class="postHead--footer">
                                <span><i class="fa fa-thumbs-up"></i><a href="#">Like</a></span>
                                <span><i class="fa fa-comment"></i><a href="#">Comment</a></span>
                                <span><i class="fa fa-share-alt"></i><a href="#">Share</a></span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach



        </div>
    </div>

@endsection

