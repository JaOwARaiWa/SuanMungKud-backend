<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Employee_Work;
use App\Models\Work;
use App\Models\Invoice;
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

    public function assign_work(Request $request) {
        $date = date("Y-m-d");

        $have_work = Work::where("date", "=", $date)->get();

        if (count($have_work) != 0) {

            $employees = $request->data;

            foreach ($employees as $employee) {
                $employee_work = [
                    'work_id' => $have_work[0]->id,
                    'user_id' => ((object)$employee)->id,
                ];
                Employee_Work::create($employee_work);
            }

            return response()->json([
                'message' => "assigned success",
            ]);
        }

        $work = [
            'date' => $date,
            'assign_by' => $request->input('admin')
        ];

        $today_work = Work::create($work);

        $employees = $request->data;

        foreach ($employees as $employee) {
            $employee_work = [
                'work_id' => $today_work->id,
                'user_id' => ((object)$employee)->id,
            ];
            Employee_Work::create($employee_work);
        }

        return response()->json([
            'message' => "assigned success",
        ]);
    }

    public function create_invoice(Request $request) {
        $date = date("Y-m-d");

        $invoice = [
            'date' => $date,
            'crate' => $request->input('crate'),
            'delivery' => $request->input('delivery'),
            'weight' => $request->input('weight'),
            'price' => $request->input('price'),
            'create_by' => $request->input('create_by'),
            'to' => $request->input('to'),
        ];

        $create = Invoice::create($invoice);

        return response()->json($create);
    }

    public function can_assigned($date) {
        $works = Work::where("date", "=", $date)->get();

        if (count($works) == 0) {
            $users = User::where("role", "=", "EMPLOYEE")->get();
            return response()->json($users);
        }

        $id = $works[0]->id;
        $check = substr($id, 0);

        $employee_works = Employee_Work::where("work_id", "=", $check)->with("user")->get();

        $already = array();
        foreach ($employee_works as $user) {
            array_push($already, $user->user);
        }

        $users = User::where("role", "=", "EMPLOYEE")->get();
        $not_yet = array();
        foreach ($users as $user) {
            array_push($not_yet, $user);
        }

        $can_assign = array_diff($not_yet, $already);

        $can_assigns = array_values($can_assign);
        $can_assigns = json_decode(json_encode($can_assigns));

        return response()->json($can_assigns);
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
        $users = User::where("role", "=", "EMPLOYEE")->get();
        return response()->json($users);
    }

    public function all_partners() {
        $users = User::where("role", "=", "PARTNER")->get();
        return response()->json($users);
    }
}
