<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use Hash;
use Illuminate\Http\Request;

class EmployeeAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('employee.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'fullname' => 'required|string',
            'password' => 'required|string',
        ]);

        $employee = Employe::where('fullname', $request->fullname)->first();

        if ($employee && Hash::check($request->password, $employee->password)) {
            session(['employee_id' => $employee->id]);
            return redirect('/employee/dashboard');
        } else {
            return back()->withErrors(['fullname' => 'Fullname or password incorrect']);
        }
    }

    public function logout()
    {
        session()->forget('employee_id');
        return redirect('/employee/login');
    }
}
