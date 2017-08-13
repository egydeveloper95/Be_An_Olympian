<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Model\user;
use App\Model\Post;
use App\event;
use App\eventuser;
use App\comment;
use App\like;
use App\eventclub;
use App\report;
use App\reporttype;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use DB;
use View;

class PostsAjaxController extends Controller
{

//===========================================================================================================

    public function index()
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
            $ssn = session()->get('Website');
            $define = 1;


        }

        $user = DB::table('users')->where('UserId', session()->get('userid'))->get();

        $Posttype = DB::table('posttypes')->lists('PostType', 'PostTypeId');


        $Categorytype = DB::table('categorytypes')->lists('CategoryTypeName', 'CategoryTypeID');

        $reporttype = DB::table('reporttypes')->lists('ReportType', 'ReportTypeId');




        $eventType = DB::table('eventtype')->lists('EventTypeName', 'EventTypeId');
        $arr = DB::table('followings')->where("FollowerId", "=",session()->get('userid'))->lists('FollowedId');

        if (session()->get('userid') != null ){


            $post=Post::with('UserPost')
                ->where('PostDisplayed', 1)
                ->where('postwritertype', 1)
                ->whereIn("UserId", $arr)
                ->orWhere("UserId", session()->get('userid'))
                ->orderBy('PostDateTime', 'DESC')
                ->get();


        }






        if (session()->get('clubid') != null  ) {

            $post = Post::with('UserPost')
                ->where('PostDisplayed', 1)

                ->orderBy('PostDateTime', 'DESC')
                ->get();}

        $clubposts = Post::with('clubPost')
            ->where('PostDisplayed', 1)
            ->where('postwritertype', 2)
            ->orderBy('PostDateTime', 'DESC')->get();
        $posts = $post->merge($clubposts);
        $posts->sortByDesc('PostDateTime');
        if( $posts->isEmpty()){ /*lw user 3aml login wm4 3aml follow l users */
            return  redirect ('searchResults');


        }


        //dd($posts);


        $userevents = event::with('UserEvent')
            ->where('EventCreator', 1)
            ->where('EventStatus', 1)
            ->orderBy('CreatedAt', 'DESC')->get();

        $clubEvent = event::with('ClubEvent')
            ->where('EventCreator', 2)
            ->where('EventStatus', 1)
            ->orderBy('CreatedAt', 'DESC')->get();
        $events = $userevents->merge($clubEvent);
        $events->sortByDesc('CreatedAt');


        $user_like = DB::table('likes')
            ->where('user_id', session()->get('userid'))
            ->get();
        $postid_all = array_pluck($user_like, 'post_id');


        $followuser = DB::table('followings')
            ->where('FollowerId', session()->get('userid'))
            ->get();

        $followerid_all = array_pluck($followuser, 'FollowedId');

        //$user_all=array_pluck($eventuser,'user_id');

        return View::make
        ('posts.index',
            compact('posts'
                , 'events'
                , 'url'
                , 'id'
                , 'fName'
                , 'lName'
                , 'gender'
                , 'email'
                , 'phone', 'addres', 'password', 'dop', 'ssn', 'define'))
            ->with('followerid_all', $followerid_all)
            ->with('user', $user)
            ->with('Posttype', $Posttype)
            ->with('Categorytype', $Categorytype)
            ->with('eventType', $eventType)
            ->with('reporttype',$reporttype)


            ->with('postid_all', $postid_all);

    }

//===========================================================================================================

    public function upload(Request $request)
    {

        $post = new Post();
        $name = " ";
        $extention = " ";
        if (input::hasfile("image")) {

            $files = Input::file('image');
            $extention = $files->getClientOriginalExtension();
            $name = time() . "_" . $files->getClientOriginalName();
            if ($name != " ") {
                $image = $files->move(public_path() . '/post_image', $name);
                $post->postImage = $name;
            }

        }

        $post->PostDescription = $request->PostDescription;
        $post->PostDisplayed = 1;
        $post->category_id = $request->category_id;
        $post->PostTypeID = 2;
        if (session()->get('userid') != null) {
            $post->postwritertype = 1;
            $post->UserId = session()->get('userid');
        } else {
            $post->postwritertype = 2;
            $post->UserId = session()->get('clubid');

        }
        $post->save();
        if ($name != " ") {
            $post->postImage = URL('public/post_image/' . $name);
        } else {
            $post->postImage = " ";
        }
        if (session()->get('userid') != null) {
            $post->userfname = session()->get('userfname');
            $post->UserProfilePicture = URL('public/UserPP/' . session()->get('UserProfilePicture'));
        } else {
            $post->userfname = session()->get('clubname');
            $post->UserProfilePicture = URL('public/ClubPP/' . session()->get('profilepicture'));
        }

        $post->currentDate = date('Y-m-d H:i:s');
        $post->extention = $extention;
        $post->id;
        return response()->json($post);

    }

//===========================================================================================================

    public function RemovePost($PostID)
    {

        DB::table('posts')->where("id", $PostID)->delete();
        return response()->json($PostID);
    }

//===========================================================================================================
    public function CreateEvent(Request $request)
    {


        $event = new event();
        $name = " ";
        if (input::hasfile("image")) {

            $files = Input::file('image');
            $name = time() . "_" . $files->getClientOriginalName();
            if ($name != " ") {
                $image = $files->move(public_path() . '/event_image', $name);
                $event->Image = $name;
            }


        }

        $event->Event_name = $request->Event_name;

        $event->EventDescription = $request->EventDescription;
        $event->EventStartDate = $request->EventStartDate;
        $event->EventEndDate = $request->EventEndDate;
        $event->EventStatus = 1;
        $event->AddresId = 2;
        $event->EventTypeID = $request->EventTypeId;
        if (session()->get('userid') != null) {
            $event->UserId = session()->get('userid');
            $event->EventCreator = 1;
        } else {
            $event->UserId = session()->get('clubid');
            $event->EventCreator = 2;

        }


        $event->save();
        if ($name != " ") {
            $event->Image = URL('public/event_image/' . $name);
        } else {
            $event->Image = " ";
        }
        if (session()->get('userid') != null) {
            $event->userfname = session()->get('userfname');
            $event->UserProfilePicture = URL('public/UserPP/' . session()->get('UserProfilePicture'));
        } else {
            $event->userfname = session()->get('clubname');

            $event->UserProfilePicture = URL('public/ClubPP/' . session()->get('profilepicture'));

        }


        $event->currentDate = date('Y-m-d H:i:s');

        return response()->json($event);

    }

//===========================================================================================================


    public function profile()
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
        $reporttype = DB::table('reporttypes')->lists('ReportType', 'ReportTypeId');
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
            $ssn = session()->get('Website');
            $define = 2;
        }

        if (session()->get('userid') != null) {
            $user = DB::table('users')->where('UserId', session()->get('userid'))->get();
            $Posttype = DB::table('posttypes')->lists('PostType', 'PostTypeId');
            $eventType = DB::table('eventtype')->lists('EventTypeName', 'EventTypeId');
            $Categorytype = DB::table('categorytypes')->lists('CategoryTypeName', 'CategoryTypeID');
            $posts = Post::with('UserPost')
                ->where('PostDisplayed', 1)
                ->where('postwritertype', 1)
                ->where('UserId', session()->get('userid'))
                ->orderBy('PostDateTime', 'DESC')->get();


            $events = event::with('UserEvent')
                ->where('EventStatus', 1)
                ->where('UserId', session()->get('userid'))
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
                ->with('reporttype',$reporttype)
                ->with('events', $events);
        } elseif (session()->get('clubid') != null) {
            $user = DB::table('clubs')->where('ClubId', session()->get('clubid'))->get();
            $Posttype = DB::table('posttypes')->lists('PostType', 'PostTypeId');
            $eventType = DB::table('eventtype')->lists('EventTypeName', 'EventTypeId');
            $Categorytype = DB::table('categorytypes')->lists('CategoryTypeName', 'CategoryTypeID');
            $posts = Post::with('clubPost')
                ->where('PostDisplayed', 1)
                ->where('postwritertype', 2)
                ->where('UserId', session()->get('clubid'))->orderBy('PostDateTime', 'DESC')->get();
            $events = null;//event::with('UserEvent')->where('EventStatus', 1)->where('UserId' ,session()->get('userid'))->orderBy('CreatedAt', 'DESC')->get();
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
                ->with('reporttype',$reporttype)
                ->with('events', $events);


        }


    }

    public function Events()
    {
        $event = new event();
        $event = DB::table('event')->where('EventStatus', 1)->orderBy('CreatedAt', 'DESC')->get();
        // return view('user.index', ['users' => $users]);
        if (session()->get('userid') != null) {
            $eventuser = DB::table('eventusers')
                ->where('user_id', session()->get('userid'))
                ->get();
            $eventid_all = array_pluck($eventuser, 'event_id');
        } else {
            $eventuser = DB::table('eventclubs')
                ->where('club_id', session()->get('clubid'))
                ->get();
            $eventid_all = array_pluck($eventuser, 'event_id');
        }

        //$user_all=array_pluck($eventuser,'user_id');


        return view('blog.Events', ['event' => $event], ['eventid_all' => $eventid_all]);

    }

    public function Check_EventUser($eventId)
    {
        //  dd($eventId);
        if (session()->get('userid') != null) {
            $user_id = session()->get('userid');
            $eventuser = DB::table('eventusers')
                ->where('user_id', $user_id)
                ->where('event_id', $eventId)
                ->get();

        } elseif (session()->get('clubid') != null) {
            $clubid = session()->get('clubid');
            //   var_dump($user_id);

            $eventuser = DB::table('eventclubs')
                ->where('club_id', $clubid)
                ->where('event_id', $eventId)
                ->get();

        }


        if ($eventuser != null)//table have data and the user going to event
        {
            return "True";

        } else//the table dosen't have data and user not going to event
        {
            return "False";

        }
    }

    public function addEventUser(Request $request)
    {
        if (session()->get('userid') != null) {
            $eventFollower = new eventuser();
            $user_id = session()->get('userid');
            /*       var_dump($user_id);
                   die;*/
            $eventFollower->user_id = $user_id;
            $eventFollower->event_id = $request->input('id');
            $event = DB::table('eventusers')
                ->where('user_id', $eventFollower->user_id)
                ->where("event_id", $eventFollower->event_id)->get();
        } else {
            $eventFollower = new eventclub();
            $clubid = session()->get('clubid');
            $eventFollower->club_id = $clubid;
            $eventFollower->event_id = $request->input('id');
            $event = DB::table('eventclubs')
                ->where('club_id', $eventFollower->club_id)
                ->where("event_id", $eventFollower->event_id)->get();

        }

        if ($event == null) {
            $eventFollower->save();
        }

    }

    public function deleteEventUser(Request $request)
    {
        if (session()->get('userid') != null) {
            $eventFollower = new eventuser();
            $eventFollower->user_id = session()->get('userid');
            $eventFollower->event_id = $request->input('id');
            $deletedRows = DB::table('eventusers')
                ->where('user_id', $eventFollower->user_id)
                ->where("event_id", $eventFollower->event_id)->delete();
        } else {
            $eventFollower = new eventclub();
            $eventFollower->club_id = session()->get('clubid');
            $eventFollower->event_id = $request->input('id');
            $deletedRows = DB::table('eventclubs')
                ->where('club_id', $eventFollower->club_id)
                ->where("event_id", $eventFollower->event_id)->delete();

        }


        $eventFollower->delete();
    }

    public function Respond()
    {
        return view('blog.Respond');
    }

    public function Coachs()
    {
        return view('blog.Coachs');
    }

    public function ClubWall()
    {
        return view('blog.ClubWall');
    }




    /*comment && like functions*/
    public function add_comment(Request $request)
    {


        $comment = new Comment();
        $comment->PostID= $request->input('PostID');
        $comment->Content= $request->commentDescription;


        if(session()->get('userid')!=null){
            $comment->UserId=session()->get('userid');


            $comment->save();
            $comment->UserProfilePicture = URL('public/UserPP/'.session()->get('UserProfilePicture') );
            $comment->UserFirstName=session()->get('userfname');
            $comment->UserLastName=session()->get('userlname');







            return response()->json($comment);



        }




        if(session()->get('clubid')!=null){
            $comment->ClubId=session()->get('clubid');


            $comment->save();
            $comment->UserProfilePicture = URL('public/ClubPP/'.session()->get('profilepicture') );
            $comment->UserFirstName=session()->get('clubname');








            return response()->json($comment);



        }








    }


    public function check_user_like($postId)
    {
        if(session()->get('userid')!=null){

            $user_id = session()->get('userid');


            $likeuser = DB::table('likes')
                ->where('user_id', $user_id)
                ->where('post_id', $postId)
                ->where('liker_type', 1)
                ->get();

            if ($likeuser != null) {
                return "True";

            } else {
                return "False";

            }}

        if(session()->get('clubid')!=null){

            $club_id = session()->get('clubid');


            $likeclub = DB::table('likes')
                ->where('user_id', $club_id)
                ->where('post_id', $postId)
                ->where('liker_type', 2)
                ->get();

            if ($likeclub != null) {
                return "True";

            } else {
                return "False";

            }}









    }























    public function add_like(Request $request)
    {


        $like = new Like();
        /*$like->post_id=Input::get('like_status');*/
        $like->post_id = $request->input('id');

        if(session()->get('userid')!=null){
            $like->user_id = session()->get('userid');
            $like->liker_type=1;

            $likeuser = DB::table('likes')
                ->where('user_id', $like->user_id)
                ->where("post_id", $like->post_id)
                ->where('liker_type', 1)
                ->get();
            if ($likeuser == null) {
                $like->save();
            }}



        if(session()->get('clubid')!=null){
            $like->user_id = session()->get('clubid');
            $like->liker_type=2;

            $likeuser = DB::table('likes')
                ->where('user_id', $like->user_id)
                ->where("post_id", $like->post_id)
                ->where('liker_type', 2)
                ->get();
            if ($likeuser == null) {
                $like->save();
            }}






    }


    public function delete_like(Request $request)
    {

        $like = new Like();
        /*$like->post_id=Input::get('like_status');*/
        $like->post_id = $request->input('id');

        if(session()->get('userid')!=null){
            $like->liker_type=1;
            $like->user_id = session()->get('userid');

            $likeuser = DB::table('likes')
                ->where('user_id', $like->user_id)
                ->where("post_id", $like->post_id)
                ->where("liker_type", 1)
                ->delete();
            $like->delete();}




        if(session()->get('clubid')!=null){
            $like->liker_type=2;
            $like->user_id = session()->get('clubid');

            $user = DB::table('likes')
                ->where('user_id', $like->user_id)
                ->where("post_id", $like->post_id)
                ->where("liker_type", 2)
                ->delete();
            $like->delete();}



    }



    public function reportpost(Request $request)
    {$report = new report();

        $report->post_id = $request->input('id');
        $report->ReportTypeID=$request->input('typeId');

        if (session()->get('userid') != null) {
            $is_reported=DB::table('reports')   /*check if user report this post before*/
            ->where('post_id',$request->input('id'))
                ->where('ReporterID',session()->get('userid'))
                ->where('reporter_type',1)

                ->count();





            if($is_reported==0){
            $report->ReporterID = session()->get('userid');

            $report->reporter_type=1;

            $report->save();
            $this->checkReports($report->post_id);
            return response()->json($report);}

        } else if (session()->get('clubid') != null) {
            $is_reported=DB::table('reports')   /*check if user report this post before*/
            ->where('post_id',$request->input('id'))
                ->where('ReporterID',session()->get('clubid'))
                ->where('reporter_type',2)

                ->count();
            if($is_reported==0){
            $report->ReporterID = session()->get('clubid');
            $report->reporter_type=2;


            $report->save();
            $this->checkReports($report->post_id);
            return response()->json($report);}



    }



}



//====================<<check num of post reports to make it not displayed====
    public function checkReports($id){
        $count=DB::table('reports')
            ->where('post_id',$id)->count();
        echo $count;
        if($count>=3){
            DB::table('posts')
                ->where('id',$id)
                ->update(['PostDisplayed'=>0]);
        }

    }


}