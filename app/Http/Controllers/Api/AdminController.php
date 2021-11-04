<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Employee_Work;
use App\Models\Work;
use App\Models\Invoice;
use App\Models\User_Invoice;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Facades\JWTAuth;

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
                'date' => $date,
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
        ];
        
        $create = Invoice::create($invoice);

        $user_invoice = [
            'invoice_id' => $create->id,
            'create_by' => $request->input('create_by'),
            'sent_to' => $request->input('sent_to'),
            'date' => $date,
        ];

        User_Invoice::create($user_invoice);

        return response()->json($create);
    }

    public function today_invoice($date) {
        $invoices = User_Invoice::where("date", "=", $date)->with("create_by", "sent_to", "invoice")->get();

        if (count($invoices) == 0) {
            return response()->json([
                "message" => "no today invoice"
            ]);
        }

        return response()->json([
            "message" => "have today invoice",
            "invoice" => $invoices
        ]);

        $invoices = Invoice::where("date", "=", $date)->get();

        if (count($invoices) == 0) {
            return response()->json([
                "message" => "no today invoice"
            ]);
        } else {
            return response()->json([
                "message" => "have today invoice",
                "work" => $invoices
            ]);
        }
    }

    public function already_assigned($date) {
        $works = Employee_Work::where("date", "=", $date)->with("work_id", "user_id")->get();

        if (count($works) == 0) {
            return response()->json([
                "message" => "no already assigned",
            ]);
        }

        return response()->json([
            "message" => "have assigned",
            "work" => $works
        ]);
    }

    public function can_assigned($date) {
        $works = Employee_Work::where('date', '=', $date)->with("user_id")->get();

        if (count($works) == 0) {
            $users = User::where("role", "=", "EMPLOYEE")->get();
            return response()->json($users);
        }

        $already_id = array();
        foreach ($works as $user) {
            array_push($already_id, $user->user_id);
        }

        $users = User::where("role", "=", "EMPLOYEE")->whereNotIn('id', $already_id)->get();

        return response()->json($users);
    }

    public function all_users() {
        $users = User::get();
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

    public function done_work($id) {
        $work = Employee_Work::where("id", "=", $id)->update(["is_finished" => "เสร็จสิ้น"]);
        return response()->json([
            "message" => "done"
        ]);
    }

    public function update_payment_status($id) {
        $work = Work::where("id", "=", $id)->update(["payment_status" => "จ่ายค่าจ้างแล้ว"]);

        $date = date("Y-m-d");
        $users = Employee_Work::where([["date", "=", $date], ['is_finished', "=", "เสร็จสิ้น"]])->update(["payment_status" => "ได้ค่าจ้างแล้ว"]);

        return response()->json([
            "message" => "updated"
        ]);
    }

    public function accept_invoice($id) {
        $work = Invoice::where("id", "=", $id)->update(["status" => "ได้รับสินค้าแล้ว"]);
        return response()->json([
            "message" => "done"
        ]);
    }

    public function my_invoice($id) {
        $date = date("Y-m-d");

        $invoices = User_Invoice::where("date", "=", $date)->with("create_by", "sent_to", "invoice")->get();

        if (count($invoices) == 0) {
            return response()->json([
                "message" => "no invoice"
            ]);
        }

        $my_invoices = array();
        foreach ($invoices as $invoice) {
            if ($invoice->sent_to == $id) {
                array_push($my_invoices, $invoice);
            }
        }

        if (count($my_invoices) == 0) {
            return response()->json([
                "message" => "no invoice"
            ]);
        }

        return response()->json([
            "message" => "have invoice",
            "invoice" => $my_invoices
        ]);
    }

    public function my_work($id) {
        $date = date("Y-m-d");
        $works = Employee_Work::where([["date", "=", $date], ["user_id", "=", $id]])->with("work_id", "user_id")->get();

        if (count($works) == 0) {
            return response()->json([
                "message" => "no assignment",
            ]);
        }

        return response()->json([
            "message" => "have assignment",
            "work" => $works
        ]);
    }

}
