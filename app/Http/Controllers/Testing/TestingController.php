<?php

namespace KazEDU\Http\Controllers\Testing;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use KazEDU\Http\Controllers\Controller;
use Auth;

// Linked models

use KazEDU\Roles;
use KazEDU\Lecture;
use KazEDU\LectureToTest;
use KazEDU\TestingUsers;
use KazEDU\ResultsUser;
use KazEDU\AnswerStudents;
use KazEDU\InfoPerson;
use KazEDU\UserToLecture;
use KazEDU\User;

class TestingController extends Controller
{
    public function TestingIndex()
    {
    	$id = Auth::user()->id;
        $roles = Roles::where('id', '=', $id)->value('roles_user');
		$lectures = Lecture::all();

		$testing = TestingUsers::all();

    	return view('testing.adminHome', compact('roles', 'lectures', 'testing'));
    }

    public function allTestIndex()
    {
        $id = Auth::user()->id;
        $roles = Roles::where('id', '=', $id)->value('roles_user');
        $lectures = Lecture::all();

        $testing = TestingUsers::all();

        return view('testing.allTests', compact('roles', 'lectures', 'testing'));
    }

    public function addTest(Request $request)
    {
    	$test = new TestingUsers;

    	$test->question = $request->input('question');
    	$test->optionA = $request->input('optionA');
    	$test->optionB = $request->input('optionB');
    	$test->optionC = $request->input('optionC');
    	$test->optionD = $request->input('optionD');
    	$test->correct_answer = $request->input('correct_answer');

    	$test->save();

    	$lectureTest = new LectureToTest;
    	$lectureTest->lecture_id = $request->input('lecture_id');
    	$lectureTest->tests_id = $test->id;

    	$lectureTest->save();

    	return back();
    }

    public function updateTest(Request $request, $id)
    {
    	$test = TestingUsers::find($id);

    	$test->question = $request->input('question');
    	$test->optionA = $request->input('optionA');
    	$test->optionB = $request->input('optionB');
    	$test->optionC = $request->input('optionC');
    	$test->optionD = $request->input('optionD');
    	$test->correct_answer = $request->input('correct_answer');

    	$test->save();

    	$lectureTest = new LectureToTest;
    	$lectureTest->lecture_id = $request->input('lecture_id');
    	$lectureTest->tests_id = $test->id;

    	$lectureTest->save();

    	return back();
    }

    public function updateTestIndex($id_test)
    {
       	$id = Auth::user()->id;
        $roles = Roles::where('id', '=', $id)->value('roles_user');

		$lectures = Lecture::all();
        
        $testingForm = TestingUsers::find($id_test);

        $testing = TestingUsers::all();

    	return view('testing.editTesting', compact('roles', 'lectures', 'testing', 'testingForm'));
    }

    public function deleteTest(Request $request, $id)
    {
    	$deleteTest = TestingUsers::find($id);
        $deleteRelations = LectureToTest::find($id);

    	$deleteTest->delete();
        $deleteRelations->delete();

    	return back();
    }

    public function testingView($id)
    {
    	$roles = Roles::select('roles_user')->first();
		$roles = Roles::where('roles_user', '=', $roles)->get();
		$lectures = Lecture::find($id);

		$testing = LectureToTest::join('testing_users', 'testing_users.id', '=', 'tests_id')
                                ->where('lecture_id', $id)
                                ->get();

    	return view('testing.viewTest', compact('roles', 'lectures', 'testing'));
    }

    public function checkAnswer(Request $request, $id)
    {   	
        $id1 = Auth::user()->id;
        $roles = Roles::where('id', '=', $id1)->value('roles_user');

        $lectureInform = Lecture::select()
                                ->where('id', '=', $id)
                                ->get();

        $lectures = Lecture::where('id', '=', $id)->get();

        foreach ($lectures as $value) {
            $lectures_name = $value->name_lectures;
        }
        $info_student = InfoPerson::where('user_id', '=', $id1)->get();
        $input = $request->all();

        if (isset($input['options'])) {
            $array_of_options = $input['options'];
            foreach ($array_of_options as $key => $value) {
                $answer = TestingUsers::select('correct_answer')->where('id', '=', $key)->get();
                if(count($answer) === 1) {
                    $answer = $answer->first();
                    if($answer->correct_answer === $value) {
                        $correct_answer[$key] = $value;
                    } else {
                        $wrong_answer[$key] = $value;
                    }
                }
            }
            if(isset($correct_answer)) {
                $correct_answer_count = count($correct_answer);
                $correct_answer_arrays = array_keys($correct_answer);
            } else {
                $correct_answer_count = 0;
                $correct_answer = null;
            }

            if (isset($wrong_answer)) {
                $wrong_answer_count = count($wrong_answer);
            } else {
                $wrong_answer_count = 0;
                $wrong_answer = null;
            }
            $success_percentage = ($correct_answer_count * 100)/($correct_answer_count + $wrong_answer_count);

            $result_data = [
                'user_id' => Auth::user()->id,
                'attempts' => ($correct_answer_count + $wrong_answer_count),
                'results' => $correct_answer_count,
                'uncorrect' => $wrong_answer_count,
                'percentage' => $success_percentage,
                'name_lectures' => $lectures_name,
            ];

            $userToLecture = [
                'user_id' => Auth::user()->id,
                'lectures_id' => $id
            ];

            $linkedUser = UserToLecture::insert($userToLecture);
            $resUser = ResultsUser::insert($result_data);
            $user_given_inputs = $input['options'];

            return view('results.showStudentResults')->with(['user_given_inputs' => $user_given_inputs, 'correct_answer' => $correct_answer, 'uncorrect' => $wrong_answer, 'percentage' => $success_percentage, 'roles' => $roles, 'lecture' => $lectures, 'info' => $info_student, 'lectureInform' => $lectureInform]);
        } else {
            return view('results.showStudentResults')->with(['message' => 'Вы не ответили один из любых вопросов. Попробуйте еще раз']);
        }
    }

    public function showResults()
    {
        $id = Auth::user()->id;
        $roles = Roles::where('id', '=', $id)->value('roles_user');

        $id_lecture = UserToLecture::select('user_id', 'name_lectures')
                                        ->join('lectures', 'lectures.id', '=', 'user_to_lectures.lectures_id')
                                        ->where('user_id', '!=', $id)->get();
        $resultUser = ResultsUser::join('info_people', 'info_people.user_id', '=', 'results_users.user_id')
                                ->where('results_users.user_id', '!=', $id)
                                ->get();

        $result = $resultUser->union($id_lecture);
        
        return view('results.adminResults')->with(['roles' => $roles, 'result' => $result, 'lecture' => $id_lecture]);
    }
}
