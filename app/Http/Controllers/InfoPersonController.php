<?php

namespace KazEDU\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

// Linked models

use KazEDU\InfoPerson;
use KazEDU\Roles;
use KazEDU\ResultsUser;
use KazEDU\UserToLecture;

class InfoPersonController extends Controller
{
    public function viewInfo()
    {
    	$id = Auth::user()->id;
        $roles = Roles::where('id', '=', $id)->value('roles_user');

        $id_lecture = UserToLecture::where('user_id', '=', $id)->value('user_id');

        $lectures = Lecture::select('name_lectures')
                            ->where('id', '=', $id_lecture)
                            ->get();

        $lt = ResultsUser::select('uncorrect')
                            ->join('user_to_results', 'user_to_results.user_id', '=', 'results_users.user_id')
                            ->where('results_users.user_id', '=', $id)
                            ->get();                           

        $rt = ResultsUser::select('results')
                            ->join('user_to_results', 'user_to_results.user_id', '=', 'results_users.user_id')
                            ->where('results_users.user_id', '=', $id)
                            ->get();

        $result = ResultsUser::select('results', 'attempts', 'percentage')
                                ->join('user_to_lectures', 'user_to_lectures.user_id', '=', 'results_users.user_id')
                                ->where('results_users.user_id', '=', $id)
                                ->get();

        $info = InfoPerson::select()
                    ->where('user_id', '=', $id)
                    ->get();

        foreach ($rt as $value) {
            foreach ($lt as $value1) {
                $count = $value->results - $value1->uncorrect;          
            }
        }

        return view('student.home', compact('result', 'roles', 'lectures', 'count', 'info'));
    }

    public function homeAccount()
    {
    	return view('student.account');
    }

    public function addInfo(Request $request)
    {
    	$info_person = new InfoPerson;
    	$info_person->firstname = $request->input('firstname');
    	$info_person->lastname = $request->input('lastname');
    	$info_person->date_birth = $request->input('birthday');
    	$info_person->speciality = $request->input('speciality');
    	$info_person->mobile_phone = $request->input('phone');
    	$info_person->address = $request->input('address');
    	$info_person->user_id = Auth::user()->id;

    	$info_person->save();

    	return back();
    }
}
