<?php
/**
 * Created by PhpStorm.
 * User: Ahmed Esmail
 * Date: 12/03/2017
 * Time: 11:23 ص
 */
namespace App\Http\Controllers;

use App\Model\User;
use Illuminate\Http\Request;
use DB;
use Monolog\Handler\ElasticSearchHandler;
use View;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use App\Model\club;

use App\Model\clubfollower;
use App\trainrequest;
use Illuminate\Support\Facades\Session;



class ClubController extends Controller
{


    public function AcceptRequestClub(Request $request)

    {


        DB::table('trainrequests')->where('sender_id', $request->input('id'))->where('receiver_id', session()->get('clubid'))->update(['status' => 1]);

    }
    public function RefuseRequestClub(Request $request)

    {


        DB::table('trainrequests')->where('sender_id', $request->input('id'))->where('receiver_id', session()->get('clubid'))->delete();

    }
    public function ClubTrainRequest(Request $request)
    {
        $TrainRequest = new trainrequest();
        $TrainRequest->sender_id = session()->get('userid');
        $TrainRequest->receiver_id = $request->input('id');
        $TrainRequest->receiver_type = 2;
        $TrainRequest->status = 0;
        $TrainRequest->save();
    }

    public function CancelTrainRequestClub(Request $request){

        DB::table('trainrequests')->where('sender_id', session()->get('userid'))->where('receiver_id',$request->input('id'))->where('receiver_type',2)->delete();
    }

    // followClub Page
    public function followClub()
    {
        $clubs=new club();
        $clubs=DB::table('clubs')->get();
        $clubfollower=DB::table('clubfollowers')
        ->where('User_Id',session()->get('userid'))
        ->get();
        $clubfollower_all=array_pluck($clubfollower,'Club_Id');
        return view('blog.followClub',['clubs' => $clubs],['clubfollower_all'=>$clubfollower_all]);


    }
     public function Check_club($clubId)
    {

      //  dd($eventId);
         
        $user_id=session()->get('userid');
     //   var_dump($user_id);
               
        $clubfollower=DB::table('clubfollowers')
        ->where('User_Id',$user_id)    
        ->where('Club_Id',$clubId)
        ->get();

        if($clubfollower!=null)//table have data and the user going to event 
        {
            return "True";

        }else//the table dosen't have data and user not going to event
        {
            return "False";

        }
    }


    public function addItem(Request $request)// to add followers
    {

        // This will dump and die

        $clubfollower=new clubfollower();

        $user_id=session()->get('userid');
        /*       var_dump($user_id);
               die;*/
        $clubfollower->User_Id = $user_id;
        $clubfollower->Club_Id=$request->input('id');
        $club=DB::table('clubfollowers')
            ->where('User_Id',$clubfollower->User_Id)
            ->where("Club_Id",$clubfollower->Club_Id)->get();
        if($club==null)
        {
            $clubfollower->save();
        }

    }
    public function DeleteFromClubFollowers(Request $request)
    {
        $clubfollower=new clubfollower();
        $clubfollower->User_Id = session()->get('userid');
        $clubfollower->Club_Id=$request->input('id');
        $deletedRows = DB::table('clubfollowers')
            ->where('User_Id',$clubfollower->User_Id)
            ->where("Club_Id",$clubfollower->Club_Id)->delete();

        $clubfollower->delete();

    }



    public function storeClub(Request $request)
    {

        $club = new  club;
        $club->ClubName = Input::get("ClubName");
        $club->city = Input::get("city");;
        $club->Website = Input::get("Website");
        $club->password = Input::get("password");
        $club->mail = Input::get("mail");


        if (input::hasfile("image")) {
            $files = Input::file('image');
            $name = time() . "_" . $files->getClientOriginalName();
            $image = $files->move(public_path() . '/ClubPP', $name);
            $club->profilepicture = $name;


        }


        $club->save();
        return redirect('successRegister');


    }


}





