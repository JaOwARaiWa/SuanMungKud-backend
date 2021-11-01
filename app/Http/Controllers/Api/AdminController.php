<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function __construct() {
        $this->middleware('auth:api');
    }
    
    public function create_user(Request $request) {
        $user = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'role' => $request->input('role'),
            'contact_number' => $request->input('contact_number'),
            'bank_account' => $request->input('bank_account'),
        ];

        $user_create = User::create($user);

        return response()->json([
            'message' => "create success",
            'new_user' => $user
        ]);
    }

    public function delete_user($id) {
        $user = User::findOrFail($id);
        $user->delete();

        $users = User::get();

        return response()->json($users);
    }

    public function all_users() {
        $users = User::get();
        // $admins = array();
        // $employees = array();
        // $partners = array();
        // foreach ($users as $user) {
        //     if ($user->role == "ADMIN") {
        //         array_push($admins, $user);
        //     } else if ($user->role == "EMPLOYEE") {
        //         array_push($employees, $user);
        //     } else if ($user->role == "PARTNER") {
        //         array_push($partners, $user);
        //     }
        // }

        // $sorted_data = array();
        // foreach ($admins as $admin) {
        //     array_push($sorted_data, $admin);
        // }
        // foreach ($employees as $employee) {
        //     array_push($sorted_data, $employee);
        // }
        // foreach ($partners as $partner) {
        //     array_push($sorted_data, $partner);
        // }

        return response()->json($users);
    }

    public function all_employees() {
        $users = User::get();
        $employees = array();
        foreach ($users as $user) {
            if ($user->role == "EMPLOYEE") {
                array_push($employees, $user);
            }
        }

        return response()->json($employees);
    }
}
