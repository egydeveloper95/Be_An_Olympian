@extends('layouts.postsLayOut')

@section('content')
    <br>


    <style>


        .wall .personalInfo .imageInfo .cover .img_up {
            width: 80px;
            height: 80px;
            @if(session()->get('userid')!=null)
                 background: url("{{URL::to('public/UserPP/'.((session()->get('UserProfilePicture'))))}}");
            @endif

            @if(session()->get('clubid')!=null)
                 background: url("{{URL::to('public/ClubPP/'.((session()->get('profilepicture'))))}}");
            @endif

             background-size: cover;
            position: relative;
            left: 50%;
            top: 40%;
            transform: translate(-40px, 0);
            border-radius: 50%;
            border: 2px solid #fff
        }


    </style>



    <div class="wall">
        <div class="container">
            <div class="row">
                <div class="personalInfo text-center col-lg-3">
                    <div class="imageInfo">
                        <div class="cover">
                            <div class="img_up"></div>
                        </div>

                        <div class="infos">
                            @if(session()->get('userid')!=null)
                                <h3>{{session()->get('userfname')}} {{session()->get('userlname')}}</h3>
                            @endif
                            @if(session()->get('clubid')!=null)
                                <h3> {{session()->get('clubname')}}</h3>
                            @endif


                        </div>
                        <hr>
                        <div class="update">
                            <a href="{{ url('/editProfile') }}">Update your Profile</a>
                        </div>

                    </div>
                </div>
                <div class="col-lg-9">
                    <table class="table" style="background:#fff;color:#000">
                        <thead>
                        <tr style="background:#283e4a;color:#fff;">
                            <th><i class="fa fa-calendar-o" style="padding-right:10px"></i>From</th>
                            <th style="width:400px;"><i class="fa fa-envelope" style="padding-right:10px"></i>Message
                            </th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($invitations as $key )
                        </tr>


                        @if($key->sender_type==1)


                            <?php
                            $users = DB::table('users')->where('UserId', $key->user_sender)->first();
                            ?>









                            <tr style="height:100px">
                                <td>
                                    <img class="img_t" src="public/UserPP/{{$users->UserProfilePicture }}">

                                    <span>{{$users->UserFirstName}} </span>
                                    <span> {{$users->UserLastName}} </span>
                                    <br>

                                    <script type="text/javascript">
                                        $(".res").click(function () {
                                            $(".showUp_2").slideDown();

                                        });
                                    </script>

                                </td>
                                <td>{{$key->message}}</td>
                                <td>
                                    <button class="edit-modal btn btn-primary" data-a="{{$key->id}}"
                                            data-id="{{$key->user_sender}}" data-title="{{$key->message}}">
                                        <span class="glyphicon glyphicon-edit"></span> Respond Message
                                    </button>
                                </td>
                            </tr>

                        @endif
                        @if($key->sender_type==2)
                            <?php
                            $clubs = DB::table('clubs')->where('ClubId', $key->user_sender)->first();
                            ?>









                            <tr style="height:100px">
                                <td>
                                    <img class="img_t" src="public/ClubPP/{{$clubs->profilepicture }}">

                                    <span>{{$clubs->ClubName}}   </span><br>

                                    <script type="text/javascript">
                                        $(".res").click(function () {
                                            $(".showUp_2").slideDown();

                                        });
                                    </script>

                                </td>
                                <td>{{$key->message}}</td>
                                <td>
                                    <button class="edit-modal btn btn-primary" data-a="{{$key->id}}"
                                            data-id="{{$key->user_sender}}" data-title="{{$key->message}}">
                                        <span class="glyphicon glyphicon-edit"></span> Respond Message
                                    </button>
                                </td>
                            </tr>
                        @endif


                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>


            <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title"></h4>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" role="form">


                                <input type="hidden" class="form-control" id="fid" disabled>
                                <input type="hidden" class="form-control" id="a" disabled>


                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="title">Message:</label>
                                    <div class="col-sm-10">
                                        <input type="name" class="form-control" id="t">
                                    </div>
                                </div>

                            </form>
                            <div class="modal-footer">
                                <button type="button" class="edit" data-dismiss="modal">
                                    <span id="footer_action_button" class='glyphicon'> </span>
                                </button>


                                <button type="button" class="btn btn-warning" data-dismiss="modal">
                                    <span class='glyphicon glyphicon-remove'></span> Close
                                </button>
                            </div>
                        </div>
                    </div>


@endsection