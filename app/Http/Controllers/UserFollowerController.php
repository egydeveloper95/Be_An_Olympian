<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Model\user;
use App\following;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

use DB;
use View;

class UserFollowerController extends Controller
{
	 public function check_follower($userId)
    {

      //  dd($eventId);
        $user_id=session()->get('userid');
     //   var_dump($user_id);
               
        $followuser=DB::table('followings')
        ->where('FollowerId',$user_id)    
        ->where('FollowedId',$userId)
        ->get();

        if($followuser!=null)//table have data and the user going to event 
        {
            return "True";

        }else//the table dosen't have data and user not going to event
        {
            return "False";

        }
    }
    public function addFollower(Request $request)
    {
        $Follower=new following();

        $user_id=session()->get('userid');
        /*       var_dump($user_id);
               die;*/
        $Follower->FollowerId = $user_id;
        $Follower->FollowedId=$request->input('id');
        $userfollower=DB::table('followings')
            ->where('FollowerId',$Follower->FollowerId)
            ->where("FollowedId", $Follower->FollowedId)->get();
        if($userfollower==null)
        {
            $Follower->save();
        }

    }
    public function DeleteFollower(Request $request)
    {
    	$Follower=new following();

        $user_id=session()->get('userid');

       
        $Follower->FollowerId = $user_id;
        $Follower->FollowedId=$request->input('id');
        $userfollower=DB::table('followings')
        ->where('FollowerId',$Follower->FollowerId)
        ->where("FollowedId", $Follower->FollowedId)->delete();

        $Follower->delete();
    }


}