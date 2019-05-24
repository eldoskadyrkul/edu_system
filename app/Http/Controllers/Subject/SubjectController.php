<?php

namespace KazEDU\Http\Controllers\Subject;

use Illuminate\Http\Request;
use KazEDU\Http\Controllers\Controller;
use KazEDU\Lecture;
use KazEDU\Subject;
use KazEDU\Roles;
use Auth;

class SubjectController extends Controller
{
    public function indexSubject()
    {
    	$subjects = Subject::all();

    	$lectures = Lecture::all();

    	$id = Auth::user()->id;
        
        $roles = Roles::where('id', '=', $id)->value('roles_user');

    	return view('subjects.adminHome', compact('subjects', 'lectures', 'roles'));
    }

    public function addSubject(Request $req)
    {
    	
    	$subject = new Subject;

    	$subject->subject_name = $req->input('subject_name');
    	$subject->lecture_id = Lecture::first()->id;

    	$subject->save();

    	return back();
    }

    public function deleteSubject($id)
    {
    	$subjectDelete = Subject::find($id);

    	$subjectDelete->delete();

    	return back();
    }

    public function updateSubject(Request $request, $id)
    {
    	$subject = Subject::all();

    	$lectures = Lecture::all();

    	$updateSubject = Subject::find($id);

    	$updateSubject->subject_name = $request->input('subject_name');
    	$updateSubject->lecture_id = Lecture::first()->id;

    	$updateSubject->save();

    	return view('subjects.updateSubject', compact('updateSubject', 'subject', 'lectures')); 
    }
}
