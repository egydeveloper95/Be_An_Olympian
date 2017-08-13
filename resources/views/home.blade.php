@extends('layouts.master')

@section('content')
<!-- begin Slider --> 
<!-- end Slider -->
<div id="myCarousel" class="carousel slide" data-ride="carousel" style="position:relative; height:600px;">
  

  <!-- Wrapper for slides -->
  <div class="carousel-inner"  role="listbox">
    <div class="item active">
      <img style="height:600px" src="public/img/blog/blog-item001.jpg" alt="Chania">
    </div>

    <div class="item">
      <img  style="height:600px" src="public/img/blog/blog-item002.jpg" alt="Chania">
    </div>

    <div class="item">
      <img style="height:600px" src="public/img/blog/blog-item001.jpg" alt="Flower">
    </div>

    <div class="item">
      <img style="height:600px" src="public/img/blog/blog-item002.jpg" alt="Flower">
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  
     <div class="overlay">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <h1>Join Us</h1>
            </div>
            <br>
            <div class="col-lg-5">

                <?php if(!session()->has('userid')) { ?>

                <form id="RegisterPlayer" style="margin-left:14%;height:573px"  method="post" action="storeUser" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div> 
                        <label for="UserFirstName" class="uname">First Name</label>
                        <input id="UserFirstName" name="UserFirstName" class="form-control" required="required" type="text" placeholder="First Name" />
                    </div>
                    <div> 
                        <label for="UserLastName" class="uname">Last Name</label>
                        <input id="UserLastName" name="UserLastName" class="form-control" required="required" type="text" placeholder="Last Name" />
                    </div>
                    <div class="form-group">
                        <label for="UserMail">Email address</label>
                        <input type="email" name="UserMail" class="form-control" required="required" id="UserMail"placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="UserPassword">Password</label>
                        <input type="password" name="UserPassword" class="form-control" required="required" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="UserTypeId">Type</label>
                        <select class="form-control" id="UserTypeId" name="UserTypeId">
                            <option value="2">Player</option>
                            <option value="3">Coach</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="intrest">Intrest</label>
                        {{ Form::select('category_id', $Categorytype ,  null, array('class'=>'form-control','style'=>'' )) }}
                    </div>
                    <div>
                        <a href="#" id="club">Are You Club ?</a>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block" style="position:relative;top:8px">Register</button>

                </form>
                <form id="RegisterClub" style="margin-left:14%"  method="post" action=" storeClub" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div> 
                        <label for="ClubName" class="uname">Club Name</label>
                        <input id="ClubName" name="ClubName" class="form-control" required="required" type="text" placeholder="Club Name" />
                    </div>
                    <div class="form-group">
                        <label for="mail">Email address</label>
                        <input id="mail" type="email" name="mail" class="form-control" required="required" id="exampleInputEmail1"placeholder="Enter email">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="password" class="form-control" required="required" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="city">City </label>
                        <input type="text" name="city" id="city" class="form-control" required="required" id="City"placeholder="Enter City">
                    </div>
                    <p>
                        <label>
                            Image
                        </label>
                        <input id="image"  name="image" type="file" >
                    </p>
                    <div>
                        <a href="#" id="player">Are You Player ?</a>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block" style="position:relative;top:8px">Register</button>
                </form>
                    <?php } ?>
            </div>
        </div>
    </div>

</div>




<!-- begin Trainers -->
<article class="trainers">
    <div class="container">
        <a href="#" class="btn btn-all">View all <i class="icon-right-open-mini"></i></a>
        <h2>Sucess Stories</h2>

        <div class="row">
            <div class="col-md-3 col-sm-6">
                 <img src="public/img/sp1.jpg">
                 <h2>Name</h2>
                 <p>He join us from 2015 to 2017 and have 3 middle in basketaball</p>
            </div>
            <div class="col-md-3 col-sm-6">
                 <img src="public/img/sp2.jpg">
                 <h2>Name</h2>
                 <p>The best goalkeeper in our team .. he saves the team more times and the reason for 4 championship for his team</p>
            </div> 
            <div class="col-md-3 col-sm-6">
                 <img src="public/img/sp3.jpg">
                 <h2>Name</h2>
                 <p>The best goalkeeper in our team .. he saves the team more times and the reason for 4 championship for his team</p>
            </div> 
            <div class="col-md-3 col-sm-6">
                 <img src="public/img/sp2.jpg">
                 <h2>Name</h2>
                 <p>The best goalkeeper in our team .. he saves the team more times and the reason for 4 championship for his team</p>
            </div> 
        </div>
    </div>
</article>
<!-- end Team -->


<!-- begin Trainers -->
<article class="trainers">
    <div class="container">
        <a href="#" class="btn btn-all">View all <i class="icon-right-open-mini"></i></a>
        <h2>Personal trainers</h2>

        <div class="row">
            <div class="col-md-3 col-sm-6">
                <a href="#" class="trainers-home-item"><figure>
                    <img src="public/img/trainers/trainer01.jpg" alt="//">
                    <figcaption>
                        <i class="icon-user"></i>
                        <h4>Mary Cafry</h4>
                        <span>Crossfit Personal Trainer</span>
                    </figcaption>
                </figure></a>
            </div>
            <div class="col-md-3 col-sm-6">
                <a href="#" class="trainers-home-item"><figure>
                    <img src="public/img/trainers/trainer02.jpg" alt="//">
                    <figcaption>
                        <i class="icon-user"></i>
                        <h4>Lisa Smithson</h4>
                        <span>Crossfit Personal Trainer</span>
                    </figcaption>
                </figure></a>
            </div>
            <div class="col-md-3 col-sm-6">
                <a href="#" class="trainers-home-item"><figure>
                    <img src="public/img/trainers/trainer03.jpg" alt="//">
                    <figcaption>
                        <i class="icon-user"></i>
                        <h4>Patrick Gates</h4>
                        <span>Crossfit Personal Trainer</span>
                    </figcaption>
                </figure></a>
            </div>
            <div class="col-md-3 col-sm-6">
                <a href="#" class="trainers-home-item"><figure>
                    <img src="public/img/trainers/trainer04.jpg" alt="//">
                    <figcaption>
                        <i class="icon-user"></i>
                        <h4>Rose Selton</h4>
                        <span>Crossfit Personal Trainer</span>
                    </figcaption>
                </figure></a>
            </div>
        </div>
    </div>
</article>
<!-- end Team -->

<!-- begin Events -->
<article class="bg-video">
    <div class="yt-video ratio169">
        <iframe  src="https://www.youtube.com/embed/TiDjD5V9Uo4"  allowfullscreen></iframe>
    </div>
    <div class="over">
        <h3>Go grom where you are to where you want to be</h3>
        <button class="btn btn-video" id="video-bg"><i class="icon-play"></i>Play Video</button>
    </div>
    <div class="stop">
        <i class="icon-cancel"></i>
    </div>
</article>
<!-- end Events -->
@endsection
