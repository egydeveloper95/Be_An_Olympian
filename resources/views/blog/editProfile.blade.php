@extends('layouts.postsLayOut')

@section('content')



    <!-- begin the wall section --><br><br>
    <div class="wall">
        <div class="container">
            <div class="row">


                <!-- Edit Page -->
                <section class="LoginPage" style="background:none;">
                    <div id="container_demo">
                        <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
                        <div id="wrapper" style=" margin-top:0; margin-bottom:30%">

                            <div id="register" class="animate form">
                                <form method="post" action="SaveProfile" autocomplete="on"
                                      enctype="multipart/form-data">
                                    <h1>Edit Profile</h1>
                                    <p class="col-lg-6">
                                        <label for="firstname" class="uname" data-icon="u">First Name</label>
                                        <input id="firstname" name="firstname" required="required" value="{{$fName}}"
                                               type="text" placeholder="First Name"/>
                                    </p>
                                    @if($define!=1)
                                        <p class="col-lg-6">

                                            <label for="city" class="uname" data-icon="u">City</label>
                                            <input id="city" name="city" required="required" value="{{ $addres}}"
                                                   type="text" placeholder="City"/>
                                        </p>
                                        <p class="col-lg-6">

                                            <label for="Website" class="uname" data-icon="u">WebSite</label>
                                            <input id="Website" name="website" required="required" value="{{$website}}"
                                                   type="text" placeholder="WebSite"/>
                                        </p>

                                    @endif


                                    @if($define!=2)

                                        <p class="col-lg-6">

                                            <label for="lastname" class="uname" data-icon="u">Last Name</label>
                                            <input id="lastname" name="lastname" required="required" value="{{ $lName}}"
                                                   type="text" placeholder="Last Name"/>
                                        </p>

                                        <p class="col-lg-12">
                                            <label for="address" class="youmail" data-icon=""> Your Address : </label>
                                            <select name="address" class="form-control"
                                                    style="border:1px solid #c5c5c5; width:100%">
                                                <?php $addresses = DB::table('addresses')->where('AddressId', '!=', session()->get('useradress'))->get();
                                                $my_address = DB::table('addresses')->where('AddressId', session()->get('useradress'))->first();
                                                ?>

                                                <option value="{{session()->get('useradress')}}">{{$my_address->AddressStratName}}</option>
                                                <?php
                                                foreach ($addresses as $address)
                                                { ?>
                                                <option value="{{$address->AddressId}}">{{$address->AddressStratName}}</option>
                                                <?php
                                                }
                                                ?>
                                            </select>

                                        </p>


                                        <p class="col-lg-6">
                                            <label for="phone" class="youmail" data-icon="e"> Your Phone</label>
                                            <input id="phone" name="phone" required="required" value="{{$phone}}"
                                                   type="text" placeholder="phone.."/>
                                        </p>
                                        <p class="col-lg-6">
                                            <label for="ID" class="youmail" data-icon="e"> Your National ID</label>
                                            <input id="ID" name="ssn" required="required" type="text" value="{{ $ssn}}"
                                                   placeholder="National ID.."/>
                                        </p>
                                    @endif
                                    <p class="col-lg-6">
                                        <label for="date" class="youmail" data-icon="e"> Your date</label>
                                        <input id="date" name="date" required="required" type="date" value="{{$dop}}"
                                               placeholder="Data time...."/>
                                    </p>
                                    <p class="col-lg-6">
                                        <label for="email" class="youmail" data-icon="e"> Your email</label>
                                        <input id="email" name="email" value="{{$email}}" required="required"
                                               type="email" placeholder="mysupermail@mail.com" style="height:40px"/>
                                    </p>
                                    <p class="col-lg-6">
                                        <label for="password" class="youpasswd" data-icon="p">Your password </label>
                                        <input id="password" name="password" value="{{ $password}}" required="required"
                                               type="text" placeholder="eg. X8df!90EO"/>
                                    </p>
                                    @if($define!=2)


                                        <p class="Gender col-lg-6">
                                            <label>Gender</label><br>
                                            <input type="radio" class="RRA " name="UserGender" value="Male"<?php
                                                if($gender=='Male')
                                                    echo 'checked';


                                                ?>>Male
                                            <input type="radio" class="RRA " name="UserGender" value="Female"<?php
                                                if($gender=='Female')
                                                    echo 'checked';


                                                ?>>Female


                                        </p>
                                    @endif
                                    <div class="clearfix"></div>
                                    <p class="col-lg-12">
                                        <label>
                                            Image
                                        </label>
                                        <input id="image" name="image" type="file" required="required">
                                    </p>

                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                    <p class="signin button">
                                        <input type="submit" value="Edit Profile"/>
                                    </p>

                                </form>

                            </div>
                        </div>

                    </div>

                </section>
            </div>
        </div>
    </div>




@endsection