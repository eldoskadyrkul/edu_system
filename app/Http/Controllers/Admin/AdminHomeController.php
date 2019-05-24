<?php

namespace KazEDU\Http\Controllers\Admin;

use KazEDU\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

/* linked models */
use KazEDU\Lecture;
use KazEDU\User;
use KazEDU\Roles;
use KazEDU\InfoPerson;
use KazEDU\LectureToTest;
use KazEDU\Subject;
use KazEDU\ResultsUser;

class AdminHomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        $roles = Roles::where('id', '=', $id)->value('roles_user');

        $lectia = Lecture::all();
        $testing = LectureToTest::select('id')->get();
        $subject = Subject::all();
        $results = ResultsUser::all();

        $studentsInfo = InfoPerson::join('users', 'users.id', '=', 'user_id')
                            ->where('user_id', '!=', Auth::user()->id)
                            ->get();

        $students = Roles::join('info_people', 'info_people.user_id', '=', 'roles.user_id')
                        ->where('roles_user', '!=', 'Admin')
                        ->get();

        return view('admin.home', compact('lectia', 'roles', 'testing', 'subject', 'students', 'studentsInfo', 'results'));
    }
}
