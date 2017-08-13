<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use App\Model\user;

class SearchController extends Controller
{
    //
    public function index()
    {
        return view('search.search');
    }

    public function search(Request $request)
    {

        if ($request->ajax()) {
            $output = "";
            $users = DB::table('users')
                ->where('UserFirstName', 'like',$request->search . '%')
                ->where('UserId', '<>', session()->get('userid'))->get();
                /* ->orWhere('UserLastName', 'like', '%' . $request->search . '%')
                ->where('UserId', '<>', session()->get('userid'))->get();*/
            $clubs = DB::table('clubs')
                ->where('ClubName', 'like',$request->search . '%')
                ->where('ClubId', '<>', session()->get('clubid'))
                ->get();
            if ($users || $clubs) {
                foreach ($users as $key => $user) {


                    $output .=
                        '<div class="col-md-3 " >' .
                        ' <div class="info_search text-center">' .

                        '<a href="user/' . $user->UserId . '"> <img  src="public/UserPP/' . $user->UserProfilePicture . '"style="width: 250px; height:200px; border-radius: 0%;   text-decoration: none;"></a><br>' .
                        '     <span>' . $user->UserFirstName . '&nbsp;' . $user->UserLastName . '</span><br><br>' .
                        '   <button class="btn btn-primary btn-block ">Connect</button>' .
                        '<br><br>' .
                        '  </div>' .
                        '</div >';

                }
                foreach ($clubs as $key => $club) {

                    $output .=
                        '<div class="col-md-3 " >' .
                        ' <div class="info_search text-center">' .

                        '<a href="#"> <img  src="public/ClubPP/' . $club->profilepicture . '"style="width: 250px; height:200px; border-radius: 0%;   text-decoration: none;"></a><br>' .
                        '     <span>' . $club->ClubName . '</span><br><br>' .
                        '   <button class="btn btn-primary btn-block ">Connect</button>' .
                        '<br><br>' .
                        '  </div>' .
                        '</div >';

                }

                return response($output);
            }


        }
    }
}
