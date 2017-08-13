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
                <form  method="post" action="storeSubscriber" autocomplete="on" enctype="multipart/form-data">
                    <h1>Become A Subscriber</h1>
                    <br>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    
                    <p>
                        <label for="SubscriberMail" class="uname" data-icon="u" > Your email </label>
                        <input id="SubscriberMail" name="SubscriberMail" required="required" type="text" placeholder="mymail@mail.com"/>
                    <br>
                    <h5>By clicking subscribe you agree the <u>terms and conditions</u> of our website</h5></p>
                    <p class="login button">

                        <input type="submit" value="Subscribe" />
                    </p>

                </form>
            </div>


        </div>


    </div>

</section>
@endsection