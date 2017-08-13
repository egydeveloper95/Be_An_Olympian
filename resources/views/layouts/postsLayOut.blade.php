<!DOCTYPE html>
<html>

<head>
    <!-- Define Charset -->
    <meta charset="utf-8"/>

    <!-- Page Title -->
    <title>Extreme - Fitness GYM Responsive Theme</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <!-- Responsive Metatag -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

    <!-- <meta http-equiv="X-UA-Compatible" content="IE=9" />-->

    <!-- ****************************  CSS  **************************** -->
    <!-- Fonts: Open Sans and Raleway, from Google Fonts -->
    <link rel='stylesheet'
          href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800%7CRaleway:400,100,200,300,500,600,800,700,900'/>
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

            <!--<div class="search">
                    <form action="{{ url('/searchResults') }}" method="get">
                            <a href="SearchRequest" id="Searching" class="btn btn-primary">
                                Live Search
                            </a>
                        <style>
                            #Searching{
                                background: #f63;
                                color: #fff;
                                border: 0;
                                outline: 0;
                                width: 200px;
                                height: 40px;
                                line-height: 25px
                            }
                        </style>
                    </form>
                </div>-->
                <div class="search">
                    <form action="{{ url('/searchResults') }}" method="get">
                        <input type="text" name="search_name" class="form-control" required="required"
                               placeholder="Search here....."> &nbsp;&nbsp;

                        <input type="submit" value="search" name="search">

                        <a href="SearchRequest" id="Searching">
                            Live Search
                        </a>
                        <style>
                            input[type=search] {
                                width: 100%;
                            }

                            #Searching {
                                background: #f63;
                                color: #fff;
                                display: block;
                                text-decoration: none;
                                padding: 7px;
                                text-align: center;
                                border: 0;
                                outline: 0; 
                                float: left;
                                line-height: 25px;
                            }
                        </style>
                    </form>
                </div>

                <ul class="list-unstyled">
                    <li>
                        <i class="fa fa-th"></i>
                        <a href="{{ url('/posts') }}">Blog Page</a>
                    </li>
                    <?php
                    if(session()->has('userid')) {
                    $usertype_id = \App\Http\Controllers\PersonController::SelectRowbyId();
                    if($usertype_id != 1){
                    ?>
                    <li>
                        <i class="fa fa-envelope "></i>
                        <a href="{{ url('/ShowRequests') }}">Requests</a>
                    </li>
                    <?php }} else if (session()->has('clubid')){

                    ?>
                    <li>
                        <i class="fa fa-envelope "></i>
                        <a href="{{ url('/ShowRequests') }}">Requests</a>
                    </li>
                    <?php } ?>
                    <li>
                        <i class="fa fa-reply-all" aria-hidden="true"></i>
                        <a href="{{ url('/Respond') }}">Messages</a>
                    </li>

                    @if(session()->get('userid')!=null)

                        <li>
                            <i class="fa fa-user"></i>
                            <a href="{{ url('/profile') }}">View Profile</a>
                        </li>
                        @endIf
                        

                    @if(session()->get('isClub')!='True')                      
                    <li>
                        <i class="fa fa-thumbs-up "></i>
                        <a href="{{ url('/followClub') }}">Follow Clubs</a>
                    </li>
                    @endIf
                    <li>
                        <i class="fa fa-calendar-o" style="margin-bottom:10px"></i>
                        <a href="{{ url('/Events') }}">Events</a>
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

@yield('content')

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
<!-- Custom -->
{!! Html::script('public/js/jquery.mobile.custom.min.js') !!}
<!-- Resource jQuery -->


<!-- *********************** End Javascript Files *********************** -->
<!-- ******************************************************************** -->


<!-- Placeholder.js -->
<!--[if lte IE 9]>
<script src="js/vendors/placeholder.js"></script>
<script>Placeholder.init();</script> <![endif]-->
{!! Html::script('public/js/modernizr.js') !!} <!-- Modernizr -->


<!-- Custom -->
{!! Html::script('public/js/jquery.mobile.custom.min.js') !!}
<!-- Resource jQuery -->
{!! Html::script('public/js/script.js') !!}
{!! Html::script('public/js/main.js') !!}
<!-- *********************** End Javascript Files *********************** -->
<!-- ******************************************************************** -->
<script> var URL="{{ Request::root() }}";</script>
<script src="public/js/post-ajax.js"></script>

</body>
</html>

















