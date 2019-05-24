<?php

namespace KazEDU\Http\Controllers\Admin;

use KazEDU\Http\Controllers\Controller;
use Illuminate\Http\Request;
use KazEDU\AdminInfo;
use KazEDU\InfoPerson;
use KazEDU\Roles;
use KazEDU\User;
use Auth;

class AdminInfoController extends Controller
{
    public function viewAdmins()
    {
        $adminAccount = AdminInfo::select()
                                ->where('user_id', '=', Auth::user()->id)
                                ->get();

    	return view('admin.account', compact('adminAccount'));
    }

    public function addAdmins(Request $request)
    {
    	$adminInfo = new AdminInfo;

    	$adminInfo->firstname = $request->input('firstname');
    	$adminInfo->lastname = $request->input('lastname');
    	$adminInfo->gender = $request->input('gender');
    	$adminInfo->admin_birthday = $request->input('admin_birthday');
    	$adminInfo->mobile_phone = $request->input('mobile_phone');
    	$adminInfo->address = $request->input('address');
        $adminInfo->user_id = Auth::user()->id;

    	$adminInfo->save();

        return back();
    }

    public function updateInfoAdmin(Request $request, $id)
    {
    	$adminInfoID = AdminInfo::find($id);

    	$adminInfoID->firstname = $request->input('firstname');
    	$adminInfoID->lastname = $request->input('lastname');
    	$adminInfoID->gender = $request->input('gender');
    	$adminInfoID->admin_birthday = $request->input('admin_birthday');
    	$adminInfoID->mobile_phone = $request->input('mobile_phone');
    	$adminInfoID->address = $request->input('address');
        $adminInfoID->user_id = Auth::user()->id;


    	$adminInfoID->save();

        return back();
    }

    public function deleteAdminInfo($id)
    {
    	$adminInfoID = AdminInfo::find($id);

    	$adminInfoID->delete();

        return back();
    }

    public function deleteAccount($id)
    {
        $adminAccount = User::find($id);

        $adminAccount->delete();

        return back();
    }

    public function openEditAdminInfo($id)
    {

        $adminAccount = AdminInfo::select()
                                ->where('user_id', '=', Auth::user()->id)
                                ->get();

        return view('admin.editAdminAccount', compact('adminAccount'));
    }

    public function viewStudents()
    {
        $rolesStudent = Roles::where('roles_user', '=', 'Student')->get();
        $students = InfoPerson::where('user_id', '=', $rolesStudent)->get();
        
    }
}
