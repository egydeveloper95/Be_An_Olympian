<!DOCTYPE html>
<html>

<head>
    <!-- Define Charset -->
    <meta charset="utf-8"/>

    <!-- Page Title -->
    <title>Be Olympic</title>

    <!-- Responsive Metatag -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

    <!-- <meta http-equiv="X-UA-Compatible" content="IE=9" />-->

    <!-- ****************************  CSS  **************************** -->
    <!-- Fonts: Open Sans and Raleway, from Google Fonts -->
    <link rel='stylesheet'
          href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800%7CRaleway:400,100,200,300,500,600,800,700,900'/>

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
<body>

<!-- begin Header -->
<header>
    <div class="topbar">
        <div class="container">

            <?php if(!session()->has('userid')) { ?>
            <div class="col-lg-push-6 col-lg-6">
                <form class="form-inline" method="post" action="AfterLogin" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <label class="sr-only">Email</label>
                        <input type="email" name="username" class="form-control" placeholder="email">
                    </div>
                    <div class="form-group mx-sm-3">
                        <label for="inputPassword2" class="sr-only">Password</label>
                        <input type="password" name="password" class="form-control" id="inputPassword2"
                               placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-primary" style="position:relative;top:8px">Login</button>
                </form>
            </div>
            <?php } ?>
        </div>
    </div>
    <!-- begin Navbar -->
    <nav class="navbar" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#" style="width:20%;margin-top:-75px"><img src="public/img/logo.png" alt="The Image"></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav menu-effect">
                    <li class="active"><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ url('/about') }}">About</a></li>

                    <?php if (session()->has('userid')) {
                    //
                    ?>
                    <li><a href="{{ url('/posts') }}">Wall</a></li>
                    <li><a href="{{ url('/ShowRequests') }}">Requests</a></li> <?php } ?>



                    <li><a href="#">The Club</a></li>
                    <li><a href="{{ url('/faq') }}">FAQ</a></li>
                    <?php if (session()->has('userid')) {
                    //
                    ?>

                    <li><a href="{{ url('/contact') }}">Contact</a></li><?php } ?>
                    <?php if (session()->has('userid')) {
                    //
                    ?>
                    <li><a href="{{ url('/Logout') }}">Logout</a></li>  <?php } ?>
                    <li class="search menu-search">
                        <form action="http://www.coralixthemes.com/themeforest/html/extreme/demo" autocomplete="on">
                            <input id="search" name="search" type="text" placeholder="What're we looking for ?">
                            <button id="search_submit" type="submit"><i class="icon-search"></i></button>
                        </form>
                        <!-- <a href="#search"></a>-->
                    </li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>

</header>
<!-- end Header -->

@yield('content')


<!-- begin Footer -->
<footer>


    <div class="info">
        <div class="container">
            <div class="row">

                <div class="col-md-2 col-sm-4">
                    <h4>Links</h4>
                    <ul class="classes-list">
                        <li><a href="{{ url('/') }}"><i class="icon-plus"></i>Home</a></li>
                        <li><a href="{{ url('/about') }}"><i class="icon-plus"></i>About</a></li>
                        <li><a href="{{ url('/faq') }}"><i class="icon-plus"></i>FAQ</a></li>
                        <li><a href="{{ url('/contact') }}"><i class="icon-plus"></i>Contact</a></li>
                    </ul>
                </div>
                <div class="col-md-3 col-sm-8">
                    <h4>About Us</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>

                    <h4>Address</h4>
                    <address>
                        <p><i class="icon-globe"></i>Street 32165, 646 UK</p>
                        <p><i class="icon-mobile"></i>(62626) 5154 4545</p>
                        <p><i class="icon-mail"></i><a href="mailto:">email@democompany.com</a></p>
                        <p><i class="icon-clock"></i>From 10:15 AM to 07:30 PM</p>
                    </address>
                </div>
                <div class="col-md-3 col-sm-6">
                    <form action="storeSubscriber" data-ajax="1" class="foot-newsletter" method="post">
                        <h3>Subscribe</h3><br>
                        <input type="email" name="SubscriberMail" class="form-control">
                        <button class="btn btn-foot-news" type="submit"><i class="icon-mail"></i></button>
                        <div class="form-response"></div>
                    </form>
                    <p>Necessitatibus porro distinctio, ex sapiente incidunt nesciunt.</p>
                    <h4>Get Social</h4>
                    <ul class="social">
                        <li><a href="#"><i class="icon-twitter"></i></a></li>
                        <li><a href="#"><i class="icon-facebook"></i></a></li>
                        <li><a href="#"><i class="icon-vimeo"></i></a></li>
                        <li><a href="#"><i class="icon-pinterest"></i></a></li>
                        <li><a href="#"><i class="icon-gplus"></i></a></li>
                    </ul>
                </div>
                <div class="col-md-4 col-sm-6">
                    <figure class="foot-logo"><img src="public/img/logo.png" alt="//" style="margin-top:-80px"></figure>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus porro distinctio
                        consectetur adipisicing elit. Necessitatibus porro distinctio.</p>
                </div>

            </div>
        </div>
    </div>

    <div class="copy">
        <div class="container">
            <p class="top"><a href="#">Top <i class="icon-up-thin"></i></a></p>
            <p>&copy; Our Template Be Olympic .</p>
        </div>
    </div>

</footer>
<!-- end Footer -->


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

</body>
</html>