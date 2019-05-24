<?php

namespace KazEDU\Http\Controllers\Lectures;

use KazEDU\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use KazEDU\Lecture;
use KazEDU\LectureToTest;
use KazEDU\Roles;
use KazEDU\UserToLecture;


class LectureController extends Controller
{
	
	public function addLecture(Request $request)
	{
		$lecture = new Lecture;
		$lecture->name_lectures = $request->input('name_lectures');
		$lecture->description_lectures = $request->input('description_lectures');
		$lecture->short_desc = $request->input('short_desc');		
		$lecture->url_lectures = $request->input('url_lectures');

		$lecture->save();

		return back();
	}

	public function updateLecture(Request $request, $id)
	{
		$lectureFind = Lecture::find($id);

		$lectureFind->name_lectures = $request->input('name_lectures');
		$lectureFind->short_desc = $request->input('short_desc');
		$lectureFind->description_lectures = $request->input('description_lectures');
		$lectureFind->url_lectures = $request->input('url_lectures');

		$lectureFind->save();

		return back();
	}

	public function deleteLecture(Request $request, $id)
	{
		$lectureDelete = Lecture::find($id);

		$lectureDelete->delete();

		return back();
	}

	public function viewLecture()
	{
		$lectureView = Lecture::select()->get();

		return view('lecture.home', compact('lecture'));
	}

	public function linkedUserLecture($id)
	{
		$user = Auth::user()->id();

		$lecture_id = Lecture::find($id);

		$LectureSelect = new UserToLecture;

		$LectureSelect->user_id = $user;
		$LectureSelect->lecture_id = $lecture_id;

		$LectureSelect->save();

		return back();
	}

	public function lectureInform($id)
	{

		$roles = Roles::where('id', '=', $id)->value('roles_user');
		$lectureInform = Lecture::select()
								->where('id', '=', $id)
								->get();
		

		return view('lecture.viewLecture', compact('lectureInform', 'roles'));
	}

	public function adminLecture()
	{

		$adminLecture = Lecture::select()->get();

		$id = Auth::user()->id;
		$roles = Roles::where('id', '=', $id)->value('roles_user');


	    return view('lecture.adminHome', compact('roles', 'adminLecture'));
	}

	public function LectureEditIndex($id)
	{

		$lecture = Lecture::find($id);

		$adminLecture = Lecture::select()->get();

		$id = Auth::user()->id;
		$roles = Roles::where('id', '=', $id)->value('roles_user');


	    return view('lecture.editLecture', compact('roles', 'adminLecture', 'lecture'));
	}
}
