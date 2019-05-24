<?php

namespace KazEDU\Http\Controllers\Lectures;

use Illuminate\Http\Request;
use KazEDU\Http\Controllers\Controller;
use KazEDU\Roles;
use KazEDU\Lecture;

class StudentLecturesController extends Controller
{
    public function lectureIndex() {

		$roles = Roles::select('roles_user')->first();
		$roles = Roles::where('roles_user', '=', $roles)->get();

		$lecture = Lecture::all();


	    return view('lecture.home', compact('roles', 'lecture'));
	}

	public function lectureView($id)
	{

		$roles = Roles::select('roles_user')->first();
		$roles = Roles::where('roles_user', '=', $roles)->get();
		$lectureInform = Lecture::select()
								->where('id', '=', $id)
								->get();
		

		return view('lecture.viewStudentsLecture', compact('lectureInform', 'roles'));
	}
}
