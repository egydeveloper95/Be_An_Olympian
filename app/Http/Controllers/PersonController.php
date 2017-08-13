<?php

namespace App\Http\Controllers;

use App\Model\User;
use Illuminate\Http\Request;
use DB;
use Monolog\Handler\ElasticSearchHandler;
use View;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use App\Model\city;
use App\Model\governate;
use App\Model\club;
use App\Model\address;
use App\Model\complaint;
use App\Model\subscriber;
use App\invitation;
use App\categorytype;
use App\post;
use App\trainrequest;
use App\event;


use Illuminate\Support\Facades\Session;


class PersonController extends Controller
{
    public static function ShowRequests()
    {

        $requests = DB::table('trainrequests')->where('receiver_id', session()->get('userid'))->where('status', 0)->get();
        $requests_club = DB::table('trainrequests')->where('receiver_id', session()->get('clubid'))->where('status', 0)->get();

        return view('blog.ShowRequests', compact('requests', 'requests_club'));
        // hgeb beha sender_id
    }


    public static function GetUserById($id)
    {

        $users = DB::table('users')->where('UserId', $id)->get();
        $user = $users[0];
        return $user;
        // hgeb beha info el sender
    }

    public static function SelectRowbyId()
    {

        $row = DB::table('users')->where('UserId', session()->get('userid'))->first();
        if ($row->UserTypeId == 1) {
            return 1; // admin
        } elseif ($row->UserTypeId == 2) {
            return 2; // player
        } elseif ($row->UserTypeId = 3) {
            return 3; //coach
        }

    }

    public function AcceptRequest(Request $request)

    {


        DB::table('trainrequests')->where('sender_id', $request->input('id'))->where('receiver_id', session()->get('userid'))->update(['status' => 1]);

    }


    public function RefuseRequest(Request $request)

    {


        DB::table('trainrequests')->where('sender_id', $request->input('id'))->where('receiver_id', session()->get('userid'))->delete();

    }


    public function TrainRequest(Request $request)
    {
        $TrainRequest = new trainrequest();
        $TrainRequest->sender_id = session()->get('userid');
        $TrainRequest->receiver_id = $request->input('id');
        $TrainRequest->receiver_type = 1;
        $TrainRequest->status = 0;
        $TrainRequest->save();
    }


    public function CancelTrainRequest(Request $request)
    {
        DB::table('trainrequests')->where('sender_id', session()->get('userid'))->where('receiver_id', $request->input('id'))->where('receiver_type', 1)->delete();

    }

    public static function CheckTrainRequest($id, $ReceiverType_id)
    {

        $requests = DB::table('trainrequests')->where('sender_id', session()->get('userid'))->where('receiver_id', $id)->where('receiver_type', $ReceiverType_id)->get();

        if (count($requests) == 0)
            return false;
        else return true;
    }

    public static function CheckTrainRequestAccept($id, $ReceiverType_id)
    {

        $requests = DB::table('trainrequests')->where('sender_id', session()->get('userid'))->where('receiver_id', $id)->where('receiver_type', $ReceiverType_id)
            ->orWhere('sender_id', $id)->where('receiver_id', session()->get('userid'))->where('receiver_type', $ReceiverType_id)
            ->get();
        if (count($requests) == 0)
            return true;
        elseif ($requests[0]->status == 0)
            return true;
        elseif ($requests[0]->status == 1)
            return false;

    }

    public function store(Request $request)
    {
        $invitation = new invitation();
        if (session()->get('userid') != null) {


            $invitation->user_sender = session()->get('userid');
            $invitation->user_reciver = $request->input('id');
            $invitation->message = $request->input('title');
            $invitation->answered = 0;
            $invitation->sender_type = 1;
            $invitation->reciever_type = 1;
            $invitation->save();
        }

        if (session()->get('clubid') != null) {
            $invitation->user_sender = session()->get('clubid');
            $invitation->user_reciver = $request->input('id');
            $invitation->message = $request->input('title');
            $invitation->answered = 0;
            $invitation->sender_type = 2;
            $invitation->reciever_type = 1;

            $invitation->save();

        }

        return view('blog.searchResults')->withSuccess('Everything went great');
    }


    public function store_respond(Request $request)
    {
        if (session()->get('userid') != null) {

            DB::table('invitations')
                ->where('user_sender', $request->input('id'))->where('user_reciver', session()->get('userid'))
                ->where('id', $request->input('a'))
                ->update(['answered' => 1]);


            $invitation = new invitation();

            $invitation->user_sender = session()->get('userid');
            $invitation->user_reciver = $request->input('id');
            $invitation->message = $request->input('title');
            $invitation->answered = 0;
            $invitation->sender_type = 1;
            $invitation->reciever_type = 2;
        }


        if (session()->get('clubid') != null) {

            DB::table('invitations')
                ->where('user_sender', $request->input('id'))->where('user_reciver', session()->get('clubid'))
                ->where('id', $request->input('a'))
                ->update(['answered' => 1]);


            $invitation = new invitation();

            $invitation->user_sender = session()->get('clubid');
            $invitation->user_reciver = $request->input('id');
            $invitation->message = $request->input('title');
            $invitation->sender_type = 2;
            $invitation->reciever_type = 1;
            $invitation->answered = 0;
        }


        $invitation->save();


        return response()->json($invitation);
    }


    public function Respond()
    {
        if (session()->get('clubid') != null) {

            $invitations = DB::table('invitations')->where('answered', 0)->where('user_reciver', session()->get('clubid'))->get();

        } else {

            $invitations = DB::table('invitations')->where('answered', 0)->where('user_reciver', session()->get('userid'))->get();
        }


        return view('blog.Respond', ['invitations' => $invitations]);


    }


    public function index()
    {
        $Categorytype = DB::table('categorytypes')->lists('CategoryTypeName', 'CategoryTypeID');

        return view('home')->with('Categorytype', $Categorytype);
    }

    public function faq()
    {
        return view('general.faq');
    }

    public function about()
    {
        return view('general.about');
    }

    public function loginAccount()
    {
        return view('general.loginAccount');
    }

    public function Logout()
    {
        Session::flush();
        return redirect('index');
    }


    // edit profile page
    public function editProfile()
    {
        $url = null;
        $id = null;
        $fName = null;
        $lName = null;
        $gender = null;
        $email = null;
        $phone = null;
        $addres = null;
        $password = null;
        $dop = null;
        $ssn = null;
        $define = null;
        $website=null;

        if (session()->get('userid') != null) {
            $url = 'public/UserPP/' . session()->get('UserProfilePicture');
            $id = session()->get('userid');
            $fName = session()->get('userfname');
            $lName = session()->get('userlname');
            $gender = session()->get('usergender');
            $email = session()->get('useremail');
            $phone = session()->get('userphone');
            $address = session()->get('useradress');
            $password = session()->get('userpassword');
            $dop = session()->get('userdob');
            $ssn = session()->get('userssn');
            $define = 1;

            // $url=$url;
            //   {{URL::to('public/UserPP/'.(())}}
            //  dd($url);
        } else if (session()->get('clubid') != null) {
            $url = 'public/ClubPP/' . session()->get('profilepicture');
            $id = session()->get('clubid');
            $fName = session()->get('clubname');
            $email = session()->get('mail');
            $addres = session()->get('city');
            $password = session()->get('password');
            $dop = session()->get('ClubDoCons');
            $website=session()->get('website');
            $define = 2;


        }


        return view('blog.editProfile', compact(
            'url'
            , 'id'
            , 'fName'
            , 'lName'
            , 'gender'
            , 'email'
            , 'phone', 'addres', 'password', 'dop', 'ssn', 'define','website'));
    }


    public function SaveProfile(Request $request)
    {
        if (session()->get('userid') != null) {


            if (input::hasfile("image")) {
                $files = Input::file('image');
                $name = time() . "_" . $files->getClientOriginalName();
                $image = $files->move(public_path() . '/UserPP', $name);


                DB::table('users')
                    ->where('UserId', session()->get('userid'))
                    ->update(['UserProfilePicture' => $name, 'UserGender' => Input::get("UserGender"), 'UserFirstName' => Input::get("firstname"), 'UserLastName' => Input::get("lastname"), 'UserPhone' => Input::get("phone"), 'AddressId' => Input::get("address"), 'UserMail' => Input::get("email"), 'UserDOB' => Input::get("date"), 'UserSSN' => Input::get("ssn"), 'UserPassword' => Input::get("password")]);

            } else {
                return "not";
            }
            $request->session()->put('userfname', Input::get("firstname"));
            $request->session()->put('userlname', Input::get("lastname"));
            $request->session()->put('useremail', Input::get("email"));
            $request->session()->put('userphone', Input::get("phone"));
            $request->session()->put('useradress', Input::get("address"));
            $request->session()->put('userpassword', Input::get("password"));
            $request->session()->put('userdob', Input::get("date"));
            $request->session()->put('userssn', Input::get("ssn"));
            $request->session()->put('UserProfilePicture', $name);
            $request->session()->put('usergender', Input::get("UserGender"));


            return redirect("posts");
        } elseif (session()->get('clubid') != null) {

            if (input::hasfile("image")) {
                $files = Input::file('image');
                $name = time() . "_" . $files->getClientOriginalName();
                $image = $files->move(public_path() . '/ClubPP', $name);
                DB::table('clubs')
                    ->where('ClubId', session()->get('clubid'))
                    ->update([
                        'profilepicture' => $name,
                        'ClubName' => Input::get("firstname"),
                        'mail' => Input::get("email"),
                        'ClubDoCons' => Input::get("date"),
                        'Website'=>Input::get("website"),
                        "city" => Input::get("city"),
                        'password' => Input::get("password")]);

            } else {
                return "not";
            }
            $request->session()->put('clubname', Input::get("firstname"));
            $request->session()->put('city', Input::get("city"));
            $request->session()->put('ClubDoCons', Input::get("date"));
            $request->session()->put('mail', Input::get("email"));
            $request->session()->put('profilepicture', $name);
            $request->session()->put('password', Input::get("password"));
            $request->session()->put('website',Input::get("website"));
            return redirect("posts");
        }


    }


    public function AfterLogin(Request $request)
    {

        $User = new user();
        $User->UserMail = Input::get("username");
        $User->UserPassword = Input::get("password");
        $user = user::all();
        $Club = new club();
        $Club->mail = Input::get("username");
        $Club->password = Input::get("password");

        $club = club::all();

        foreach ($user as $key) {

            if ($key->UserMail == $User->UserMail && $key->UserPassword == $User->UserPassword) {
                $request->session()->put('userid', $key->UserId);
                $request->session()->put('userfname', $key->UserFirstName);
                $request->session()->put('userlname', $key->UserLastName);
                $request->session()->put('userpp', $key->UserProfilePicture);
                $request->session()->put('usergender', $key->UserGender);
                $request->session()->put('useremail', $key->UserMail);
                $request->session()->put('userphone', $key->UserPhone);
                $request->session()->put('useradress', $key->AddressId);
                $request->session()->put('userpassword', $key->UserPassword);
                $request->session()->put('userdob', $key->UserDOB);
                $request->session()->put('userssn', $key->UserSSN);
                $request->session()->put('UserProfilePicture', $key->UserProfilePicture);

               $request->session()->put('isClub','false');
                return redirect("posts");


            }


        }
        foreach ($club as $key) {
# code...
            if ($key->mail == $Club->mail && $key->password == $Club->password) {
                $request->session()->put('clubid', $key->ClubId);
                $request->session()->put('clubname', $key->ClubName);
                $request->session()->put('city', $key->city);
                $request->session()->put('ClubDoCons', $key->ClubDoCons);
                $request->session()->put('website',$key->Website);
                $request->session()->put('mail', $key->mail);
                $request->session()->put('profilepicture', $key->profilepicture);
                $request->session()->put('password', $key->password);
                $request->session()->put('isClub','True');
                return redirect("posts");


            }


        }
        if (!session()->has('userid') || !session()->has('clubid')) {
            return redirect("error");

        }


    }


    public function storeUser(Request $request)
    {

        $user = new  user;


        $user->UserFirstName = Input::get("UserFirstName");
        $user->UserLastName = Input::get("UserLastName");


        $user->UserMail = Input::get("UserMail");


        $user->intrest = $request->category_id;
        $user->UserPassword = Input::get("UserPassword");
        $user->AddressId = 1;


        $user->UserActive = 1;
        $user->UserVerified = "Not Verifed";
        $user->UserTypeId = $request->UserTypeId;


        $user->save();
        return redirect('successRegister');


    }

    public function successRegister()
    {
        return view('general.successRegister');
    }


    public function Complaint()
    {
        return view('general.contact');
    }

    public function SaveComplaint(Request $request)
    {
        $complaint = new complaint;
        $complaint->UserID = $request->session()->get('userid');
        $complaint->ComplaintSubject = input::get('subject');
        $complaint->ComplaintContent = input::get('message');
        $complaint->Answered = '0';

        $complaint->save();
        return redirect('index');
    }

    public function storeSubscriber(Request $request)
    {
        $subscriber = new subscriber;
        $subscriber->SubscriberMail = input::get("SubscriberMail");
        $subscriber->save();
        return redirect('index');
    }


    /*public function addSubscriber()
    {
        return view('general.addSubscriber');
    }*/

    public function error()
    {
        return view('general.error');
    }

    public function showProfile($UserId)
    {

        $reporttype = DB::table('reporttypes')->lists('ReportType', 'ReportTypeId');
        $user = DB::table("users")->where('UserId', $UserId)->first();


        $url = 'public/UserPP/' . $user->UserProfilePicture;
        $id = $user->UserId;
        $fName = $user->UserFirstName;
        $lName = $user->UserLastName;
        $gender = $user->UserGender;
        $email = $user->UserMail;
        $phone = $user->UserPhone;
        $address = $user->AddressId;
        $password = $user->UserPassword;
        $dop = $user->UserDOB;
        $ssn = $user->UserSSN;
        $define = 1;


        $Posttype = DB::table('posttypes')->lists('PostType', 'PostTypeId');
        $eventType = DB::table('eventtype')->lists('EventTypeName', 'EventTypeId');
        $Categorytype = DB::table('categorytypes')->lists('CategoryTypeName', 'CategoryTypeID');
        $posts = Post::with('UserPost')
            ->where('PostDisplayed', 1)
            ->where('postwritertype', 1)
            ->where('UserId', $UserId)
            ->orderBy('PostDateTime', 'DESC')->get();


        $events = event::with('UserEvent')
            ->where('EventStatus', 1)
            ->where('UserId', $UserId)
            ->orderBy('CreatedAt', 'DESC')->get();
        $followerid_all = array();
        return View::make('posts.index', compact('posts', 'url'
            , 'id'
            , 'fName'
            , 'lName'
            , 'gender'
            , 'email'
            , 'phone', 'addres', 'password', 'dop', 'ssn', 'define', 'followerid_all'))
            ->with('user', $user)
            ->with('Posttype', $Posttype)
            ->with('Categorytype', $Categorytype)
            ->with('eventType', $eventType)
            ->with('reporttype', $reporttype)
            ->with('events', $events);


    }

    /*=========show profile club==============*/
    public function showProfileClub($ClubId)
    {

        $reporttype = DB::table('reporttypes')->lists('ReportType', 'ReportTypeId');
        $club = DB::table("clubs")->where('ClubId', $ClubId)->first();


        $url = 'public/ClubPP/' . $club->profilepicture;

        $id = $club->ClubId;
        $fName = $club->ClubName;
        $email = $club->mail;
        $addres = $club->city;
        $password = $club->password;
        $dop = $club->ClubDoCons;
        $website=$club->Website;
        $define = 1;
        $lName = null;
        $gender = null;

        $phone = null;


        $Posttype = DB::table('posttypes')->lists('PostType', 'PostTypeId');
        $eventType = DB::table('eventtype')->lists('EventTypeName', 'EventTypeId');
        $Categorytype = DB::table('categorytypes')->lists('CategoryTypeName', 'CategoryTypeID');
        $posts = Post::with('clubPost')
            ->where('PostDisplayed', 1)
            ->where('postwritertype', 2)
            ->where('UserId', $ClubId)
            ->orderBy('PostDateTime', 'DESC')->get();


        $events = event::with('UserEvent')
            ->where('EventStatus', 1)
            ->where('UserId', $ClubId)
            ->orderBy('CreatedAt', 'DESC')->get();
        $followerid_all = array();
        return View::make('posts.index', compact('posts', 'url'
            , 'id'
            , 'fName'
            , 'lName'
            , 'gender'
            , 'email'
            , 'phone', 'addres', 'password', 'dop', 'ssn', 'define', 'followerid_all'))
            ->with('club', $club)
            ->with('Posttype', $Posttype)
            ->with('Categorytype', $Categorytype)
            ->with('eventType', $eventType)
            ->with('reporttype', $reporttype)
            ->with('posts', $posts)
            ->with('events', $events);


    }

    /*============================*/
    public function searchResults(Request $request)
    {

        $Search = $request->search_name;


        $users = DB::table('users')
            ->where('UserFirstName', 'like', $Search . '%')
            ->where('UserId', '<>', session()->get('userid'))
            ->orWhere('UserLastName', 'like', '%' . $Search . '%')
              ->where('UserId', '<>', session()->get('userid'))
            ->get();
        $clubs = DB::table('clubs')
            ->where('ClubName', 'like', $Search . '%')
            //   ->where('ClubId', '<>', session()->get('clubid'))
            ->where('ClubId', '<>', session()->get('clubid'))
            ->get();

        $followuser = DB::table('followings')
            ->where('FollowerId', session()->get('userid'))
            ->get();
        $followerid_all = array_pluck($followuser, 'FollowedId');
        //$user_all=array_pluck($eventuser,'user_id');


//    return view('blog.Events',['event' => $event],);


        //return view('blog.searchResults',['clubs'=>$clubs],['users'=>$users],['followerid_all'=>$followerid_all]);
        return view('blog.searchResults', compact('clubs', 'users', 'followerid_all'));

    }


}



