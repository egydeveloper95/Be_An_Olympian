@extends('layouts.master')

@section('content')

    <!-- Create Login Page -->
<section class="LoginPage">
    <div id="container_demo" >
        <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
        <a class="hiddenanchor" id="toregister"></a>
        <a class="hiddenanchor" id="tologin"></a>
        <div id="wrapper">
            <div id="login" class="animate form">
                <form  method="post" action="AfterLogin" autocomplete="on" enctype="multipart/form-data">
                    <h1>Log in</h1>
                    <br>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <br>
                    <p>
                        <label for="username" class="uname" data-icon="u" > Your email or username </label>
                        <input id="username" name="username" required="required" type="text" placeholder="myusername or mymail@mail.com"/>
                    </p>
                    <p>
                        <label for="password" class="youpasswd" data-icon="p"> Your password </label>
                        <input id="password" name="password" required="required" type="password" placeholder="eg. X8df!90EO" />
                    </p>
                    <p class="login button">
                        <input type="submit" value="Login" />
                    </p>

                    <p class="change_link">
                        Not a member yet ?
                        <a href="{{ url('/registerUser') }}" class="to_register">Sign up</a>
                    </p>
                </form>
            </div>


        </div>


    </div>

</section>
@endsection