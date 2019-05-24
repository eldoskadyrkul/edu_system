<?php

namespace KazEDU\Http\Controllers\Admin;

use Illuminate\Http\Request;
use KazEDU\Http\Controllers\Controller;
use Auth;

use KazEDU\Subject;
use KazEDU\Lecture;

class SubjectAdminController extends Controller
{
    public function SubjectsIndex()
    {  
        $id = Auth::user()->id;
          	
    	$roles = KazEDU\Roles::where('id', '=', $id)->value('roles_user');

    	return view('subjects.adminHome', compact('roles'));
    }

    public function SubjectsUpdateIndex($id)
    {
    	$subject = Subject::all();

    	$lectures = Lecture::all();

        $subjectForm = Subject::find($id);

    	return view('subjects.updateSubject', compact('subject', 'lectures', 'subjectForm'));
    }
}
