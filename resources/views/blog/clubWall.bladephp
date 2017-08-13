
    <!DOCTYPE html>
<html>
 
<head>
    <!-- Define Charset -->
    <meta charset="utf-8"/>

    <!-- Page Title -->
    <title>Extreme - Fitness GYM Responsive Theme</title>

    <!-- Responsive Metatag -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
      
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=9" />-->

    <!-- ****************************  CSS  **************************** -->
    <!-- Fonts: Open Sans and Raleway, from Google Fonts -->
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800%7CRaleway:400,100,200,300,500,600,800,700,900' />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Font icons: Fontello -->
    {!! Html::style('public/css/vendors/fontello.css') !!}   

    <!-- Bootstrap -->
    {!! Html::style('public/css/vendors/bootstrap.min.css') !!}

    <!-- Owl Carousel -->
    {!! Html::style('public/js/vendors/owl-carousel/owl.carousel.css') !!}
    {!! Html::style('public/js/vendors/owl-carousel/owl.theme.css') !!}
    
    <!-- Slider Revolution -->
    {!! Html::style('public/js/vendors/revolution/css/settings.css') !!}
    
    <!-- Custom Scroll Bars -->
    {!! Html::style('public/js/vendors/malihu/jquery.mCustomScrollbar.css') !!}
    
    <!-- Custom CSS -->
    {!! Html::style('public/css/styles.css') !!}
    {!! Html::style('public/css/colors/orange.css') !!}

    <!-- Custom CSS -->
    {!! Html::style('public/css/reset.css') !!} <!-- CSS reset -->
    {!! Html::style('public/css/style.css') !!}<!-- Resource style -->
    {!! Html::style('public/css/styles.css') !!}
    {!! Html::style('public/css/style3.css') !!}
    {!! Html::style('public/css/colors/orange.css') !!}


<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Media queries -->
    <!--[if lt IE 9]>
    <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->

</head>
<body style="background:#f6f6f6">

<!-- begin Header -->
<header>
   
    <nav class="navbar" role="navigation" style="background:#283e4a">
    <div class="container">
      
        
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="wall-list">
            <ul class="list-unstyled"> 
               <li>
                    <i class="fa fa-th fa-lg"></i>
                    <a href="{{ url('/wall') }}">Blog Page</a>
                </li>
                <li>
                    <i class="fa fa-pencil-square-o fa-lg"></i>
                    <a href="{{ url('/editProfile') }}">Edit Profile</a>
                </li>
                <li >
                    <i class="fa fa-user"></i>
                <a href="{{ url('/viewProfile') }}">View Profile</a>
                    </li>
                <li>
                   <i class="fa fa-thumbs-up" ></i>
                    <a href="{{ url('/followClub') }}">Follow Clubs</a>
                </li>
          
                <li>
                    <i class="fa fa-sign-out"></i>
                    <a href="{{ url('/Logout') }}">Logout</a>
                </li>
                
            </ul>
        </div><!--/.nav-collapse -->
    </div>
    </nav>

</header>
<!-- end Header -->

    
<!-- begin the wall section --><br><br>
<div class="wall">
    <div class="container">
        <div class="row">
            <div class="personalInfo text-center col-lg-3">
                <div class="imageInfo">
                    <div class="cover">


                        <img src="{{URL::to('public/UserPP/'.((session()->get('UserProfilePicture'))))}}">
                    </div>
                    
                    <div class="infos">
                        <h3> {{session()->get('userfname')}} {{session()->get('userlname')}} </h3>
                        <p>Soft Skills: bla bla bla</p>
                    </div>
                    <hr>
                    <div class="update">
                        <a href="{{ url('/editProfile') }}">Update your Profile</a>
                    </div>
                </div>
            </div>
            <form  action="create_post" autocomplete="on"  method="post"  enctype="multipart/form-data">
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
                            <textarea id="PostDescription" name="PostDescription" cols="60" rows="7" placeholder="Write your post here...."></textarea>
                        </div>
                        <hr>
                        <div class="postHead--footer">
                            <div class="img_upload">

                                <input  name="image" type="file" >
                            </div>
                            <br>



                            </div>
                        <div class="post_button">
                            <div class="post">
                                <label for="address"   >Category</label>
                                {{ Form::select('Categorytype', $Categorytype) }}

                            </div>

                            <div class="post_button">
                                    <div class="post">
                                        <label for="address"   >Post type</label>
                                        {{ Form::select('Posttype',  $Posttype) }}

                                    </div>

                                <div class="btnn">
                                    <input type="submit" value="Post"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </form>
            <div class="col-lg-3"> </div>
        </div>
    </div>
</div>


<!-- You Put Posts Here ↓ ------------->
<div class="ThePostsHere wall">
    <div class="container">
        <div class="postsInfo TheNewPost">
            <div class="post">
                <div class="postHead">
                    <div class="postHead--img">                        <img height="50" src="{{URL::to('public/UserPP/'.((session()->get('UserProfilePicture'))))}}">
                    </div>
                    <div class="postHead--info">
                        <h5>{{session()->get('userfname')}} {{session()->get('userlname')}}</h5>
                        <p>Time</p>
                    </div>
                    <div class="clearfix"></div>
                    <div class="postHead--post">
                        <p>The Speech of Post</p>
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
        <div class="postsInfo TheNewPost">
            <div class="post">
                <div class="postHead">
                    <div class="postHead--img"> <img height="50" src="{{URL::to('public/UserPP/'.((session()->get('UserProfilePicture'))))}}"></div>
                    <div class="postHead--info">
                        <h5>{{session()->get('userfname')}} {{session()->get('userlname')}}</h5>
                        <p>Time</p>
                    </div>
                    <div class="clearfix"></div>
                    <div class="postHead--post">
                        <p>The Speech of Post</p>
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
    </div>
</div>
 





<!-- ******************************************************************** -->
<!-- ************************* Javascript Files ************************* -->

<!-- jQuery -->
{!! Html::script('public/js/vendors/jquery/jquery-1.11.1.min.js') !!}

<!-- Respond.js media queries for IE8 -->
{!! Html::script('public/js/vendors/respond.min.js') !!}

<!-- Bootstrap-->
{!! Html::script('public/js/vendors/bootstrap.min.js') !!}

<!-- Owl Carousel -->
{!! Html::script('public/js/vendors/owl-carousel/owl.carousel.js') !!}

<!-- Slider Revolution -->
{!! Html::script('public/js/vendors/revolution/js/jquery.themepunch.plugins.min.js') !!}
{!! Html::script('public/js/vendors/revolution/js/jquery.themepunch.revolution.min.js') !!}

<!-- Custom Scroll Bars -->
{!! Html::script('public/js/vendors/malihu/jquery.mCustomScrollbar.concat.min.js') !!}

<!-- Gmaps -->
{!! Html::script('public/http://maps.google.com/maps/api/js?sensor=true') !!}
{!! Html::script('public/js/vendors/gmaps.js') !!}

{!! Html::script('public/js/vendors/bootstrap-slider.js') !!}
{!! Html::script('public/js/vendors/jquery/jquery.nav.js') !!}

<!-- Custom -->
{!! Html::script('public/js/script.js') !!}

<!-- *********************** End Javascript Files *********************** -->
<!-- ******************************************************************** -->



        <!-- Placeholder.js -->
        <!--[if lte IE 9]> <script src="js/vendors/placeholder.js" ></script> <script>Placeholder.init();</script> <![endif]-->
        {!! Html::script('public/js/modernizr.js') !!} <!-- Modernizr -->


        <!-- Custom --> 
        {!! Html::script('public/js/jquery.mobile.custom.min.js') !!}
         <!-- Resource jQuery -->
        {!! Html::script('public/js/script.js') !!}
        {!! Html::script('public/js/main.js') !!}    
        <!-- *********************** End Javascript Files *********************** -->
        <!-- ******************************************************************** -->


</body> 
</html>
