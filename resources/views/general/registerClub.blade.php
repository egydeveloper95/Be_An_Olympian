@extends('layouts.master')

@section('content')
<!-- Create Login Page -->
<section class="LoginPage">
    <div id="container_demo" >
        <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
        <a class="hiddenanchor" id="toregister"></a>
        <a class="hiddenanchor" id="tologin"></a>
        <div id="wrapper">

            <div id="register" class="animate form">

                <form  action="storeClub" autocomplete="on"  method="post"  enctype="multipart/form-data">
                    <h1> Sign up </h1>


                    <br>
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <br>
                    <p>
                        <label for="ClubName" class="uname" data-icon="u"> Name </label>
                        <input id="ClubName" name="ClubName" required="required" type="text" placeholder="Club Name" />
                    </p>
                                       <p>
                        <label for="city" class="youmail" data-icon="e" >city</label>
                        <input id="city" name="city" required="required" type="text" placeholder="city.."/>
                    </p>

                    <p>
                        <label for="ClubDoCons" class="youmail" data-icon="e" >  data of construction </label>
                        <input id="ClubDoCons" name="ClubDoCons" required="required" type="datetime-local" placeholder="ClubDoCons...."/>
                    </p>

                    <p>
                        <label for="mail" class="youmail" data-icon="e" > E-MAil</label>
                        <input id="mail" name="mail" required="required" type="email" placeholder="mysupermail@mail.com"/>
                    </p>
                    <p>
                        <label for="Website" class="uname" data-icon="u"> Website URL</label>
                        <input id="Website" name="Website" required="required" type="text" placeholder="Website URL" />
                    </p>
                    <p>
                        <label for="password" class="youpasswd" data-icon="p"> password </label>
                        <input id="password" name="password" required="required" type="password" placeholder="eg. X8df!90EO"/>
                    </p>

                    <p>
                        <label for="passwordsignup_confirm" class="youpasswd" data-icon="p">Please confirm your password </label>
                        <input id="passwordsignup_confirm" name="passwordsignup_confirm" required="required" type="password" placeholder="eg. X8df!90EO"/>
                    </p>
                    <p>


                        <label>
                            Image
                        </label>
                        <input type="file" name="image">
                    </p>
                    <p class="signin button">
                        <input type="submit" value="Sign up"/>
                    </p>
                    <p class="change_link">
                        Already a member ?
                        <a href="{{ url('/loginAccount') }}" class="to_register"> Go and log in </a>
                    </p>
                </form>

            </div>
        </div>

        <div class="two_btn">
            <button><a href="{{ url('/registerUser') }}" class="">Player</a></button>
            <button><a href="{{ url('/registerClub') }}" class="">Club</a></button>
        </div>
    </div>

</section>
@endsection