@extends('layouts.postsLayOut')

@section('content')
    <?php if(session()->has('userid')) { ?>
    <style>

        .wall .personalInfo .imageInfo .cover .img_up {
            width: 80px;
            height: 80px;
            background: url("{{URL::to('public/UserPP/'.((session()->get('UserProfilePicture'))))}}");
            background-size: cover;
            position: relative;
            left: 50%;
            top: 40%;
            transform: translate(-40px, 0);
            border-radius: 50%;
            border: 2px solid #fff
        }


    </style>

    <br><br>
    <div class="wall">
        <div class="container">
            <div class="personalInfo text-center col-lg-3">
                <div class="imageInfo">
                    <div class="cover">
                        <div class="img_up"></div>
                    </div>

                    <div class="infos">
                        <h3>{{session()->get('userfname')}} {{session()->get('userlname')}}</h3>

                    </div>
                    <hr>
                    <div class="update">

                        <a href="{{ url('/editProfile') }}">Update your Profile</a>
                    </div>

                </div>
            </div>
            <?php } ?>
            <?php if(session()->has('clubid')) { ?>
            <style>

                .wall .personalInfo .imageInfo .cover .img_up {
                    width: 80px;
                    height: 80px;
                    background: url("{{URL::to('public/ClubPP/'.((session()->get('profilepicture'))))}}");
                    background-size: cover;
                    position: relative;
                    left: 50%;
                    top: 40%;
                    transform: translate(-40px, 0);
                    border-radius: 50%;
                    border: 2px solid #fff
                }


            </style>

            <br><br>
            <div class="wall">
                <div class="container">
                    <div class="personalInfo text-center col-lg-3">
                        <div class="imageInfo">
                            <div class="cover">
                                <div class="img_up"></div>
                            </div>

                            <div class="infos">
                                <h3>{{session()->get('clubname')}}</h3>

                                </p>
                            </div>
                            <hr>
                            <div class="update">
                                <a href="{{ url('/editProfile') }}">Update your Profile</a>
                            </div>

                        </div>
                    </div>
                    <?php } ?>
                    <div class="col-md-9 Searching">

                        <h3 class="resulting"> Result for Search : </h3>
                        <div class="row">
                            <!--  ----------------------------- -->
                            <?php
                            $Go = "Follow";
                            $No = "Unfollow";


                            // Retreive Users

                            foreach ($users as $key => $user) {
                            $receiver_type_id = 1;

                            ?>
                            <div class="">
                                <div class="left_info">
                                    <div class="img_name">
                                        <img src="{{URL::to('/public/UserPP/'.$user->UserProfilePicture)}}" alt=""
                                             width="70px"
                                             height="70px">

                                    </div>
                                    <div class="img_info">
                                        <h4>{{$user->UserFirstName}}&nbsp;{{$user->UserLastName}}</h4>
                                        @if($user->UserTypeId==1)
                                            <span class="types">Admin</span>
                                        @endif
                                        @if($user->UserTypeId==2)
                                            <span class="types">Player</span>
                                        @endif
                                        @if($user->UserTypeId==3)
                                            <span class="types">Coach</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="right_info">

                                    <td>
                                        <a href="user/{{$user->UserId}}"><span class="glyphicon glyphicon-user"></span>&nbsp;Profile</a>
                                        <?php
                                        if (session()->has('userid')){
                                        $Usertype_id = \App\Http\Controllers\PersonController::SelectRowbyId();
                                        if ( $Usertype_id == 2 && $user->UserTypeId == 3){
                                        if(\App\Http\Controllers\PersonController::CheckTrainRequestAccept($user->UserId, $receiver_type_id)){
                                        ?>


                                        <button class="edit-modal2 btn btn-primary" data-id="{{$user->UserId}}">
                                            <span class="glyphicon glyphicon-edit"></span> Invite
                                        </button>

                                        @if (in_array($user->UserId, $followerid_all))
                                            <button class="btn btn-info" onclick="fun_checkFollower(event)"
                                                    value="{{$user->UserId}}"
                                                    id="btnUnfollow{{$user->UserId}}">
                                                <span class="glyphicon glyphicon-share-alt"></span>&nbsp;
                                                {{$No}}</button>
                                        @else
                                            <button class="btn btn-info" onClick="fun_checkFollower(event)"
                                                    value="{{$user->UserId}}" id="btnFollow{{$user->UserId}}">
                                                <span class="glyphicon glyphicon-share-alt"></span>&nbsp;
                                                {{$Go}}</button>
                                            @endIf
                                            <?php if (\App\Http\Controllers\PersonController::CheckTrainRequest($user->UserId, $receiver_type_id)) {
                                                echo "<button class='cancelrequest btn btn-success' id='" . $user->UserId . "' data-id='" . $user->UserId . "'><i class='fa fa-check' aria-hidden='true'></i> Request Sent</button>";
                                            } else {
                                                echo "<button class='train2 btn btn-warning' id='" . $user->UserId . "' data-id='" . $user->UserId . "'><i class='fa fa-paper-plane' aria-hidden='true'></i> Send Train Request</button>";

                                            }
                                            ?>


                                            <?php      }
                                            elseif(!\App\Http\Controllers\PersonController::CheckTrainRequestAccept($user->UserId, $receiver_type_id)){
                                            ?>
                                            <button class="edit-modal2 btn btn-primary" data-id="{{$user->UserId}}">
                                                <span class="glyphicon glyphicon-edit"></span> Invite
                                            </button>

                                            @if (in_array($user->UserId, $followerid_all))
                                                <button class="btn btn-info" onclick="fun_checkFollower(event)"
                                                        value="{{$user->UserId}}"
                                                        id="btnUnfollow{{$user->UserId}}">
                                                    <span class="glyphicon glyphicon-share-alt"></span>&nbsp;
                                                    {{$No}}</button>
                                            @else
                                                <button class="btn btn-info" onClick="fun_checkFollower(event)"
                                                        value="{{$user->UserId}}" id="btnFollow{{$user->UserId}}">
                                                    <span class="glyphicon glyphicon-share-alt"></span>&nbsp;
                                                    {{$Go}}</button>
                                                @endIf
                                                <?php }
                                                }
                                                elseif ( $Usertype_id == 2 && $user->UserTypeId == 2){

                                                ?>

                                                <button class="edit-modal2 btn btn-primary" data-id="{{$user->UserId}}">
                                                    <span class="glyphicon glyphicon-edit"></span> Invite
                                                </button>

                                                @if (in_array($user->UserId, $followerid_all))
                                                    <button class="btn btn-info" onclick="fun_checkFollower(event)"
                                                            value="{{$user->UserId}}"
                                                            id="btnUnfollow{{$user->UserId}}">
                                                        <span class="glyphicon glyphicon-share-alt"></span>&nbsp;
                                                        {{$No}}</button>
                                                @else
                                                    <button class="btn btn-info" onClick="fun_checkFollower(event)"
                                                            value="{{$user->UserId}}" id="btnFollow{{$user->UserId}}">
                                                        <span class="glyphicon glyphicon-share-alt"></span>&nbsp;
                                                        {{$Go}}</button>
                                                    @endIf


                                                    <?php      }
                                                    elseif ( $Usertype_id == 2 && $user->UserTypeId == 1){

                                                    ?>

                                                    <button class="edit-modal2 btn btn-primary"
                                                            data-id="{{$user->UserId}}">
                                                        <span class="glyphicon glyphicon-edit"></span> Invite
                                                    </button>

                                                    @if (in_array($user->UserId, $followerid_all))
                                                        <button class="btn btn-info"
                                                                onclick="fun_checkFollower(event)"
                                                                value="{{$user->UserId}}"
                                                                id="btnUnfollow{{$user->UserId}}">
                                                            <span class="glyphicon glyphicon-share-alt"></span>&nbsp;
                                                            {{$No}}</button>
                                                    @else
                                                        <button class="btn btn-info"
                                                                onClick="fun_checkFollower(event)"
                                                                value="{{$user->UserId}}"
                                                                id="btnFollow{{$user->UserId}}">
                                                            <span class="glyphicon glyphicon-share-alt"></span>&nbsp;
                                                            {{$Go}}</button>
                                                        @endIf


                                                        <?php      }
                                                        elseif ( $Usertype_id == 3 && $user->UserTypeId == 1){

                                                        ?>

                                                        <button class="edit-modal2 btn btn-primary"
                                                                data-id="{{$user->UserId}}">
                                                            <span class="glyphicon glyphicon-edit"></span> Invite
                                                        </button>

                                                        @if (in_array($user->UserId, $followerid_all))
                                                            <button class="btn btn-info"
                                                                    onclick="fun_checkFollower(event)"
                                                                    value="{{$user->UserId}}"
                                                                    id="btnUnfollow{{$user->UserId}}">
                                                                <span class="glyphicon glyphicon-share-alt"></span>&nbsp;
                                                                {{$No}}</button>
                                                        @else
                                                            <button class="btn btn-info"
                                                                    onClick="fun_checkFollower(event)"
                                                                    value="{{$user->UserId}}"
                                                                    id="btnFollow{{$user->UserId}}">
                                                                <span class="glyphicon glyphicon-share-alt"></span>&nbsp;
                                                                {{$Go}}</button>
                                                            @endIf


                                                            <?php      }
                                                            elseif($Usertype_id == 3 && $user->UserTypeId == 2){
                                                            if(\App\Http\Controllers\PersonController::CheckTrainRequestAccept($user->UserId, $receiver_type_id)){
                                                            ?>


                                                            <button class="edit-modal2 btn btn-primary"
                                                                    data-id="{{$user->UserId}}">
                                                                <span class="glyphicon glyphicon-edit"></span> Invite
                                                            </button>

                                                            @if (in_array($user->UserId, $followerid_all))
                                                                <button class="btn btn-info"
                                                                        onclick="fun_checkFollower(event)"
                                                                        value="{{$user->UserId}}"
                                                                        id="btnUnfollow{{$user->UserId}}">
                                                                    <span class="glyphicon glyphicon-share-alt"></span>&nbsp;
                                                                    {{$No}}</button>
                                                            @else
                                                                <button class="btn btn-info"
                                                                        onClick="fun_checkFollower(event)"
                                                                        value="{{$user->UserId}}"
                                                                        id="btnFollow{{$user->UserId}}">
                                                                    <span class="glyphicon glyphicon-share-alt"></span>&nbsp;
                                                                    {{$Go}}</button>
                                                                @endIf
                                                                <?php if (\App\Http\Controllers\PersonController::CheckTrainRequest($user->UserId, $receiver_type_id)) {
                                                                    echo "<button class='cancelrequest btn btn-success' id='" . $user->UserId . "' data-id='" . $user->UserId . "'><i class='fa fa-check' aria-hidden='true'></i> Request Sent</button>";
                                                                } else {
                                                                    echo "<button class='train2 btn btn-warning' id='" . $user->UserId . "' data-id='" . $user->UserId . "'><i class='fa fa-paper-plane' aria-hidden='true'></i> Send Train Request</button>";

                                                                }
                                                                ?>
                                                                <?php      }
                                                                elseif(!\App\Http\Controllers\PersonController::CheckTrainRequestAccept($user->UserId, $receiver_type_id)){
                                                                ?>
                                                                <button class="edit-modal2 btn btn-primary"
                                                                        data-id="{{$user->UserId}}">
                                                                    <span class="glyphicon glyphicon-edit"></span>
                                                                    Invite
                                                                </button>

                                                                @if (in_array($user->UserId, $followerid_all))
                                                                    <button class="btn btn-info"
                                                                            onclick="fun_checkFollower(event)"
                                                                            value="{{$user->UserId}}"
                                                                            id="btnUnfollow{{$user->UserId}}">
                                                                        <span class="glyphicon glyphicon-share-alt"></span>&nbsp;
                                                                        {{$No}}</button>
                                                                @else
                                                                    <button class="btn btn-info"
                                                                            onClick="fun_checkFollower(event)"
                                                                            value="{{$user->UserId}}"
                                                                            id="btnFollow{{$user->UserId}}">
                                                                        <span class="glyphicon glyphicon-share-alt"></span>&nbsp;
                                                                        {{$Go}}</button>
                                                                    @endIf
                                                                    <?php }
                                                                    }
                                                                    elseif ( $Usertype_id == 3 && $user->UserTypeId == 3){

                                                                    ?>

                                                                    <button class="edit-modal2 btn btn-primary"
                                                                            data-id="{{$user->UserId}}">
                                                                        <span class="glyphicon glyphicon-edit"></span>
                                                                        Invite
                                                                    </button>

                                                                    @if (in_array($user->UserId, $followerid_all))
                                                                        <button class="btn btn-info"
                                                                                onclick="fun_checkFollower(event)"
                                                                                value="{{$user->UserId}}"
                                                                                id="btnUnfollow{{$user->UserId}}">
                                                                            <span class="glyphicon glyphicon-share-alt"></span>&nbsp;
                                                                            {{$No}}</button>
                                                                    @else
                                                                        <button class="btn btn-info"
                                                                                onClick="fun_checkFollower(event)"
                                                                                value="{{$user->UserId}}"
                                                                                id="btnFollow{{$user->UserId}}">
                                                                            <span class="glyphicon glyphicon-share-alt"></span>&nbsp;
                                                                            {{$Go}}</button>
                                                                        @endIf
                                                                        <?php      }
                                                                        elseif($Usertype_id == 1 && $user->UserTypeId == 2)
                                                                        { ?>
                                                                        <button class="edit-modal2 btn btn-primary"
                                                                                data-id="{{$user->UserId}}">
                                                                            <span class="glyphicon glyphicon-edit"></span>
                                                                            Invite
                                                                        </button>

                                                                        @if (in_array($user->UserId, $followerid_all))
                                                                            <button class="btn btn-info"
                                                                                    onclick="fun_checkFollower(event)"
                                                                                    value="{{$user->UserId}}"
                                                                                    id="btnUnfollow{{$user->UserId}}">
                                                                                <span class="glyphicon glyphicon-share-alt"></span>&nbsp;
                                                                                {{$No}}</button>
                                                                        @else
                                                                            <button class="btn btn-info"
                                                                                    onClick="fun_checkFollower(event)"
                                                                                    value="{{$user->UserId}}"
                                                                                    id="btnFollow{{$user->UserId}}">
                                                                                <span class="glyphicon glyphicon-share-alt"></span>&nbsp;
                                                                                {{$Go}}</button>
                                                                            @endIf
                                                                            <?php  }
                                                                            elseif ( $Usertype_id == 1 && $user->UserTypeId == 1){

                                                                            ?>

                                                                            <button class="edit-modal2 btn btn-primary"
                                                                                    data-id="{{$user->UserId}}">
                                                                                <span class="glyphicon glyphicon-edit"></span>
                                                                                Invite
                                                                            </button>

                                                                            @if (in_array($user->UserId, $followerid_all))
                                                                                <button class="btn btn-info"
                                                                                        onclick="fun_checkFollower(event)"
                                                                                        value="{{$user->UserId}}"
                                                                                        id="btnUnfollow{{$user->UserId}}">
                                                                                    <span class="glyphicon glyphicon-share-alt"></span>&nbsp;
                                                                                    {{$No}}</button>
                                                                            @else
                                                                                <button class="btn btn-info"
                                                                                        onClick="fun_checkFollower(event)"
                                                                                        value="{{$user->UserId}}"
                                                                                        id="btnFollow{{$user->UserId}}">
                                                                                    <span class="glyphicon glyphicon-share-alt"></span>&nbsp;
                                                                                    {{$Go}}</button>
                                                                                @endIf
                                                                                <?php      }
                                                                                elseif($Usertype_id == 1 && $user->UserTypeId == 3)
                                                                                { ?>
                                                                                <button class="edit-modal2 btn btn-primary"
                                                                                        data-id="{{$user->UserId}}">
                                                                                    <span class="glyphicon glyphicon-edit"></span>
                                                                                    Invite
                                                                                </button>

                                                                                @if (in_array($user->UserId, $followerid_all))
                                                                                    <button class="btn btn-info"
                                                                                            onclick="fun_checkFollower(event)"
                                                                                            value="{{$user->UserId}}"
                                                                                            id="btnUnfollow{{$user->UserId}}">
                                                                                        <span class="glyphicon glyphicon-share-alt"></span>&nbsp;
                                                                                        {{$No}}</button>
                                                                                @else
                                                                                    <button class="btn btn-info"
                                                                                            onClick="fun_checkFollower(event)"
                                                                                            value="{{$user->UserId}}"
                                                                                            id="btnFollow{{$user->UserId}}">
                                                                                        <span class="glyphicon glyphicon-share-alt"></span>&nbsp;
                                                                                        {{$Go}}</button>
                                                                                    @endIf
                                                                                    <?php  }}
                                                                                    elseif((session()->has('clubid')) && $user->UserTypeId == 3)
                                                                                    { ?>
                                                                                    <button class="edit-modal2 btn btn-primary"
                                                                                            data-id="{{$user->UserId}}">
                                                                                        <span class="glyphicon glyphicon-edit"></span>
                                                                                        Invite
                                                                                    </button>

                                                                                    @if (in_array($user->UserId, $followerid_all))
                                                                                        <button class="btn btn-info"
                                                                                                onclick="fun_checkFollower(event)"
                                                                                                value="{{$user->UserId}}"
                                                                                                id="btnUnfollow{{$user->UserId}}">
                                                                                            <span class="glyphicon glyphicon-share-alt"></span>&nbsp;
                                                                                            {{$No}}</button>
                                                                                    @else
                                                                                        <button class="btn btn-info"
                                                                                                onClick="fun_checkFollower(event)"
                                                                                                value="{{$user->UserId}}"
                                                                                                id="btnFollow{{$user->UserId}}">
                                                                                            <span class="glyphicon glyphicon-share-alt"></span>&nbsp;
                                                                                            {{$Go}}</button>
                                                                                        @endIf
                                                                                        <?php  }
                                                                                        elseif((session()->has('clubid')) && $user->UserTypeId == 2)
                                                                                        { ?>
                                                                                        <button class="edit-modal2 btn btn-primary"
                                                                                                data-id="{{$user->UserId}}">
                                                                                            <span class="glyphicon glyphicon-edit"></span>
                                                                                            Invite
                                                                                        </button>

                                                                                        @if (in_array($user->UserId, $followerid_all))
                                                                                            <button class="btn btn-info"
                                                                                                    onclick="fun_checkFollower(event)"
                                                                                                    value="{{$user->UserId}}"
                                                                                                    id="btnUnfollow{{$user->UserId}}">
                                                                                                <span class="glyphicon glyphicon-share-alt"></span>&nbsp;
                                                                                                {{$No}}</button>
                                                                                        @else
                                                                                            <button class="btn btn-info"
                                                                                                    onClick="fun_checkFollower(event)"
                                                                                                    value="{{$user->UserId}}"
                                                                                                    id="btnFollow{{$user->UserId}}">
                                                                                                <span class="glyphicon glyphicon-share-alt"></span>&nbsp;
                                                                                                {{$Go}}</button>
                                                                                            @endIf
                                                                                            <?php  }
                                                                                            elseif((session()->has('clubid')) && $user->UserTypeId == 1)
                                                                                            { ?>
                                                                                            <button class="edit-modal2 btn btn-primary"
                                                                                                    data-id="{{$user->UserId}}">
                                                                                                <span class="glyphicon glyphicon-edit"></span>
                                                                                                Invite
                                                                                            </button>

                                                                                            @if (in_array($user->UserId, $followerid_all))
                                                                                                <button class="btn btn-info"
                                                                                                        onclick="fun_checkFollower(event)"
                                                                                                        value="{{$user->UserId}}"
                                                                                                        id="btnUnfollow{{$user->UserId}}">
                                                                                                    <span class="glyphicon glyphicon-share-alt"></span>&nbsp;
                                                                                                    {{$No}}</button>
                                                                                            @else
                                                                                                <button class="btn btn-info"
                                                                                                        onClick="fun_checkFollower(event)"
                                                                                                        value="{{$user->UserId}}"
                                                                                                        id="btnFollow{{$user->UserId}}">
                                                                                                    <span class="glyphicon glyphicon-share-alt"></span>&nbsp;
                                                                                                    {{$Go}}</button>
                                                                                                @endIf
                                                                                                <?php  }
                                                                                                ?>

                                    </td>
                                </div>
                                <div class="clearfix"></div>
                                <hr>
                            </div>
                            <?php   }

                            // Retreive Clubs
                            foreach ($clubs as  $club) {
                            $receiver_type_id = 2;


                            ?>
                            <div class="">
                                <div class="left_info">
                                    <div class="img_name">
                                        <img src="{{URL::to('/public/ClubPP/'.$club->profilepicture)}}" alt=""
                                             width="70px"
                                             height="70px">
                                    </div>
                                    <div class="img_info">
                                        <h4>{{$club->ClubName}}</h4>
                                        <span class="types">Club</span>
                                    </div>
                                </div>
                                <div class="right_info">

                                    <td>
                                        <a href="club/{{$club->ClubId}}"><span class="glyphicon glyphicon-user"></span>&nbsp;Profile</a>
                                        <?php
                                        if (session()->has('userid')){
                                        $Usertype_id = \App\Http\Controllers\PersonController::SelectRowbyId();
                                        if ( $Usertype_id == 2){
                                        ?>
                                        <button class="edit-modal2 btn btn-primary" data-id="{{$club->ClubId}}">
                                            <span class="glyphicon glyphicon-edit"></span> Invite
                                        </button>
                                        @if (in_array($club->ClubId, $followerid_all))
                                            <button class="btn btn-info" onclick="fun_checkFollower(event)"
                                                    value="{{$club->ClubId}}"
                                                    id="btnUnfollow{{$club->ClubId}}">
                                                <span class="glyphicon glyphicon-share-alt"></span>&nbsp;
                                                {{$No}}</button>
                                        @else
                                            <button class="btn btn-info" onClick="fun_checkFollower(event)"
                                                    value="{{$club->ClubId}}" id="btnFollow{{$club->ClubId}}">
                                                <span class="glyphicon glyphicon-share-alt"></span>&nbsp;
                                                {{$Go}}</button>
                                            @endIf
                                            <?php
                                            }
                                            elseif ( $Usertype_id == 1){

                                            ?>
                                            <button class="edit-modal2 btn btn-primary" data-id="{{$club->ClubId}}">
                                                <span class="glyphicon glyphicon-edit"></span> Invite
                                            </button>

                                            @if (in_array($club->ClubId, $followerid_all))
                                                <button class="btn btn-info" onclick="fun_checkFollower(event)"
                                                        value="{{$club->ClubId}}"
                                                        id="btnUnfollow{{$club->ClubId}}">
                                                    <span class="glyphicon glyphicon-share-alt"></span>&nbsp;
                                                    {{$No}}</button>
                                            @else
                                                <button class="btn btn-info" onClick="fun_checkFollower(event)"
                                                        value="{{$club->ClubId}}" id="btnFollow{{$club->ClubId}}">
                                                    <span class="glyphicon glyphicon-share-alt"></span>&nbsp;
                                                    {{$Go}}</button>
                                                @endIf
                                                <?php
                                                }
                                                elseif ( $Usertype_id == 3){
                                                if(\App\Http\Controllers\PersonController::CheckTrainRequestAccept($club->ClubId, $receiver_type_id)){
                                                ?>



                                                <button class="edit-modal2 btn btn-primary"
                                                        data-id="{{$club->ClubId}}">
                                                    <span class="glyphicon glyphicon-edit"></span> Invite
                                                </button>

                                                @if (in_array($club->ClubId, $followerid_all))
                                                    <button class="btn btn-info"
                                                            onclick="fun_checkFollower(event)"
                                                            value="{{$club->ClubId}}"
                                                            id="btnUnfollow{{$club->ClubId}}">
                                                        <span class="glyphicon glyphicon-share-alt"></span>&nbsp;
                                                        {{$No}}</button>
                                                @else
                                                    <button class="btn btn-info"
                                                            onClick="fun_checkFollower(event)"
                                                            value="{{$club->ClubId}}"
                                                            id="btnFollow{{$club->ClubId}}">
                                                        <span class="glyphicon glyphicon-share-alt"></span>&nbsp;
                                                        {{$Go}}</button>
                                                    @endIf
                                                    <?php if (\App\Http\Controllers\PersonController::CheckTrainRequest($club->ClubId, $receiver_type_id)) {
                                                        echo "<button class='cancelrequestclub btn btn-success' id='" . $club->ClubId . "' data-id='" . $club->ClubId . "'><i class='fa fa-check' aria-hidden='true'></i> Request Sent</button>";
                                                    } else {
                                                        echo "<button class='train3 btn btn-warning' id='" . $club->ClubId . "' data-id='" . $club->ClubId . "'><i class='fa fa-paper-plane' aria-hidden='true'></i> Send Train Request</button>";

                                                    }
                                                    ?>


                                                    <?php      }
                                                    elseif(!\App\Http\Controllers\PersonController::CheckTrainRequestAccept($club->ClubId, $receiver_type_id)){
                                                    ?>
                                                    <button class="edit-modal2 btn btn-primary"
                                                            data-id="{{$club->ClubId}}">
                                                        <span class="glyphicon glyphicon-edit"></span> Invite
                                                    </button>

                                                    @if (in_array($club->ClubId, $followerid_all))
                                                        <button class="btn btn-info"
                                                                onclick="fun_checkFollower(event)"
                                                                value="{{$club->ClubId}}"
                                                                id="btnUnfollow{{$club->ClubId}}">
                                                            <span class="glyphicon glyphicon-share-alt"></span>&nbsp;
                                                            {{$No}}</button>
                                                    @else
                                                        <button class="btn btn-info"
                                                                onClick="fun_checkFollower(event)"
                                                                value="{{$club->ClubId}}"
                                                                id="btnFollow{{$club->ClubId}}">
                                                            <span class="glyphicon glyphicon-share-alt"></span>&nbsp;
                                                            {{$Go}}</button>
                                                        @endIf
                                                        <?php }
                                                        }
                                                        }
                                                        elseif((session()->has('clubid')) && $user->UserTypeId == 3)
                                                        { ?>
                                                        <button class="edit-modal2 btn btn-primary"
                                                                data-id="{{$user->UserId}}">
                                                            <span class="glyphicon glyphicon-edit"></span>
                                                            Invite
                                                        </button>

                                                        @if (in_array($user->UserId, $followerid_all))
                                                            <button class="btn btn-info"
                                                                    onclick="fun_checkFollower(event)"
                                                                    value="{{$user->UserId}}"
                                                                    id="btnUnfollow{{$user->UserId}}">
                                                                <span class="glyphicon glyphicon-share-alt"></span>&nbsp;
                                                                {{$No}}</button>
                                                        @else
                                                            <button class="btn btn-info"
                                                                    onClick="fun_checkFollower(event)"
                                                                    value="{{$user->UserId}}"
                                                                    id="btnFollow{{$user->UserId}}">
                                                                <span class="glyphicon glyphicon-share-alt"></span>&nbsp;
                                                                {{$Go}}</button>
                                                            @endIf
                                                            <?php  }
                                                            elseif((session()->has('clubid')) && $user->UserTypeId == 2)
                                                            { ?>
                                                            <button class="edit-modal2 btn btn-primary"
                                                                    data-id="{{$user->UserId}}">
                                                                <span class="glyphicon glyphicon-edit"></span>
                                                                Invite
                                                            </button>

                                                            @if (in_array($user->UserId, $followerid_all))
                                                                <button class="btn btn-info"
                                                                        onclick="fun_checkFollower(event)"
                                                                        value="{{$user->UserId}}"
                                                                        id="btnUnfollow{{$user->UserId}}">
                                                                    <span class="glyphicon glyphicon-share-alt"></span>&nbsp;
                                                                    {{$No}}</button>
                                                            @else
                                                                <button class="btn btn-info"
                                                                        onClick="fun_checkFollower(event)"
                                                                        value="{{$user->UserId}}"
                                                                        id="btnFollow{{$user->UserId}}">
                                                                    <span class="glyphicon glyphicon-share-alt"></span>&nbsp;
                                                                    {{$Go}}</button>
                                                                @endIf
                                                                <?php  }
                                                                elseif((session()->has('clubid')) && $user->UserTypeId == 1)
                                                                { ?>
                                                                <button class="edit-modal2 btn btn-primary"
                                                                        data-id="{{$user->UserId}}">
                                                                    <span class="glyphicon glyphicon-edit"></span>
                                                                    Invite
                                                                </button>

                                                                @if (in_array($user->UserId, $followerid_all))
                                                                    <button class="btn btn-info"
                                                                            onclick="fun_checkFollower(event)"
                                                                            value="{{$user->UserId}}"
                                                                            id="btnUnfollow{{$user->UserId}}">
                                                                        <span class="glyphicon glyphicon-share-alt"></span>&nbsp;
                                                                        {{$No}}</button>
                                                                @else
                                                                    <button class="btn btn-info"
                                                                            onClick="fun_checkFollower(event)"
                                                                            value="{{$user->UserId}}"
                                                                            id="btnFollow{{$user->UserId}}">
                                                                        <span class="glyphicon glyphicon-share-alt"></span>&nbsp;
                                                                        {{$Go}}</button>
                                                                    @endIf
                                                                    <?php  }
                                                                    ?>

                                    </td>
                                </div>
                                <div class="clearfix"></div>
                                <hr>
                            </div>
                            <?php   }

                            ?>

                            <div id="myModal2" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title"></h4>
                                        </div>
                                        <div class="modal-body">
                                            <form class="form-horizontal2" role="form">


                                                <input type="hidden" class="form-control" id="fid" disabled>
                                                <input type="hidden" class="form-control" id="a" disabled>


                                                <div class="form-group">
                                                    <label class="control-label col-sm-2" for="title">Message:</label>
                                                    <div class="col-sm-10">
                                                        <input type="name" class="form-control" id="t">
                                                    </div>
                                                </div>

                                            </form>
                                            <div class="modal-footer2">
                                                <button type="button" class="edit2" data-dismiss="modal">
                                                    <span id="footer_action_button" class='glyphicon'> </span>
                                                </button>

                                                <button type="button" class="btn btn-warning" data-dismiss="modal">
                                                    <span class='glyphicon glyphicon-remove'></span> Close
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                </div>


@endsection
{!! Html::script('public/js/app.js') !!}

