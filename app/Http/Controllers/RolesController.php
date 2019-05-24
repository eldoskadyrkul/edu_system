<?php

namespace KazEDU\Http\Controllers;

use Illuminate\Http\Request;
use Auth;


use KazEDU\Roles;
use KazEDU\InfoPerson;
use KazEDU\Lecture;
use KazEDU\ResultsUser;
use KazEDU\UserToLecture;
use KazEDU\LectureToTest;

class RolesController extends Controller
{
	public function insertRoles(request $request) {
	    	// Insert data in database
	    	$user_roles = new Roles;
	    	$user_roles->user_id = Auth::user()->id;
	    	$user_roles->roles_user = $request->input('admin');
	    	$user_roles->save();

	    	return back();
	    }    


	public function roles_welcome($id)
	{
		$id = Auth::user()->id;
        $roles = Roles::where('id', '=', $id)->value('roles_user');

        $id_lecture = UserToLecture::select('user_id', 'name_lectures')
                                        ->join('lectures', 'lectures.id', '=', 'user_to_lectures.lectures_id')
                                        ->where('user_id', '=', $id)->get();
        $resultUser = ResultsUser::join('info_people', 'info_people.user_id', '=', 'results_users.user_id')
                                ->where('results_users.user_id', '=', $id)
                                ->get();

        $result = $resultUser->union($id_lecture);
        
        $info = InfoPerson::select()
                    ->where('user_id', '=', $id)
                    ->get();

		return view('student.home')->with(['roles' => $roles, 'result' => $result, 'info' => $info]);
	}

	public function rolesHome($roles)
	{
		$id = Auth::user()->id;
        $role = Roles::where('id', '=', $id)->value('roles_user');


		return view('homepage.index', compact('roles'));
	}
}
