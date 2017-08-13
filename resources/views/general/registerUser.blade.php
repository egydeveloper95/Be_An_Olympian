
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
                <form  action="storeUser" autocomplete="on"  method="post"  enctype="multipart/form-data">
                    <h1> Sign up </h1>











                    <br>
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <br>
                    <p>
                        <label for="UserFirstName" class="uname" data-icon="u">First Name</label>
                        <input id="UserFirstName" name="UserFirstName" required="required" type="text" placeholder="First Name" />
                    </p>
                    <p>
                        <label for="UserLastName" class="uname" data-icon="u">Last Name</label>
                        <input id="UserLastName" name="UserLastName" required="required" type="text" placeholder="Last Name" />
                    </p>

                    <p>
                        <label for="address"   >City</label>
                        {{ Form::select('city', $City) }}
                    </p>


                    <p>
                        <label for="address"  >Goernate</label>
                        {{ Form::select('governate', $Governate) }}
                    </p>




                    <p>
                        <label for="address" class="youmail" data-icon="e" > Your Address</label>
                        <input id="address" name="address" required="required" type="text" placeholder="Address.."/>
                    </p>
                    <p>
                        <label for="UserPhone" class="youmail" data-icon="e" > Your Phone</label>
                        <input id="UserPhone" name="UserPhone" required="required" type="text" placeholder="phone.."/>
                    </p>
                    <p>
                        <label for="UserSSN" class="youmail" data-icon="e" > Your National ID</label>
                        <input id="UserSSN" name="UserSSN" required="required" type="text" placeholder="National ID.."/>
                    </p>
                    <p>
                        <label for="UserDOB" class="youmail" data-icon="e" >DOB</label>
                        <input id="UserDOB" name="UserDOB" required="required" type="datetime-local" placeholder="Date time...."/>
                    </p>
                    <p>
                        <label for="UserMail" class="youmail" data-icon="e" > Your email</label>
                        <input id="UserMail" name="UserMail" required="required" type="email" placeholder="mysupermail@mail.com"/>
                    </p>
                    <p>
                        <label for="UserPassword" class="youpasswd" data-icon="p">Your password </label>
                        <input id="UserPassword" name="UserPassword" required="required" type="password" placeholder="eg. X8df!90EO"/>
                    </p>
                    <p>
                        <label for="passwordsignup_confirm" class="youpasswd" data-icon="p">Please confirm your password </label>
                        <input id="passwordsignup_confirm" name="passwordsignup_confirm" required="required" type="password" placeholder="eg. X8df!90EO"/>
                    </p>
                    <p>
                        <label >Type </label>
                        <select id="UserTypeId" name="UserTypeId">
                            <option value="2">Player</option>
                            <option value="3">Coach</option>
                        </select>

                    </p>





                    <p class="Gender" >
                        <label>Gender</label>
                        <input type="radio" class="RRA" name="UserGender"value="Male" />Male
                        <input type="radio" class="RRA" name="UserGender" value="Female" /> Female

                    </p>
                    <p>
                        <label>
                            Image
                        </label>
                        <input  name="image" type="file" >
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
