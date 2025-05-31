<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use Hash;
use Illuminate\Http\Request;

class EmployeeAuthController extends Controller
{


    public function dashboard() {

        if (!auth('employee')->check()) {
            return redirect('/employee/login');
             }

        $employee = auth('employee')->user();
        

        return view('employee.dashboard', compact('employee'));
    }

    public function showLoginForm(){
        return view('employee.login');
    }

    public function login(Request $request){
            $request->validate([
                'fullname' => 'required|string',
                'password' => 'required|string',
            ]);

             $employee = Employe::where('fullname', $request->fullname)->first();

            if ($employee && Hash::check($request->password, $employee->password)) {
                auth('employee')->login($employee);
                return redirect('/employee/dashboard');
            } else {
                return back()->withErrors(['fullname' => 'fullname or password incorrect']);
            }
    }


    public function logout(){
        // Log out the employee using the 'employee' guard
        auth('employee')->logout();

        // Clear the session data related to the employee
        session()->forget('employee_id');

        // Redirect to the login page
        return redirect('/employee/login');
    }

}