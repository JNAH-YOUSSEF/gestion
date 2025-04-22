<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\String_;

class EmployesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employes = Employe::all() ; 

        return view('employes.index')->with([
             'employes' => $employes
        ]) ; 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employes.create') ;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'registration_number' => 'required|numeric|digits_between:1,10|unique:employes,registration_number',
            'fullname'            => 'required|string|min:3|max:255',
            'depart'              => 'required|string|max:100',
            'hire_date'           => 'required|date|before_or_equal:today',
            'phone'               => 'required',
            'address'             => 'required|string|max:255',
            'city'                => 'required|string|max:100',
        ]);
        Employe::create($request->except('_token')) ;
        return redirect()->route('employes.index')->with(['success' => 'Employe created successfully']) ;
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $employe = Employe::where('registration_number' , $id)->first() ; 
        return view('employes.show')->with([
              'employe' => $employe
        ]) ; 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $empolye=Employe::where('registration_number',$id)->first();
        return view('employes.edit')->with([
            'employe' => $empolye
        ]) ;
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $employe=Employe::where('registration_number',$id)->first();
        $this->validate($request, [
            'registration_number' => 'required|numeric|digits_between:1,10|unique:employes,id,' . $employe->registration_number,
            'fullname'            => 'required|string|min:3|max:255|unique:employes,id,' . $employe->fullname,
            'depart'              => 'required|string|max:100',
            'hire_date'           => 'required|date|before_or_equal:today',
            'phone'               => 'required|regex:/^0[5-7][0-9]{8}$/',
            'address'             => 'required|string|max:255',
            'city'                => 'required|string|max:100',
        ]);
        $employe->update($request->except('_token','_method')) ;
        return redirect()->route('employes.index')->with(['success' => 'Employe Updated successfully']) ;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
            $employe = Employe::where('registration_number' , $id)->first() ; 
            $employe->delete() ;
            return redirect()->route('employes.index')->with(['success' => 'Employe Deleted successfully']) ;

    }


    public function vacationRequest(string $id) {

          $employe = Employe::where('registration_number' , $id)->first() ; 
          return view('employes.vocation-request')->with([
             'employe' => $employe
          ]) ; 
    }

    public function certificateRequest($id) {
        $employe = Employe::where('registration_number' , $id)->first() ; 
        return view('employes.certificate-request')->with([
           'employe' => $employe
        ]) ; 
  }
  public function statistics()
{
    // Nombre total d'employés
    $totalEmployees = Employe::count();

    // Nombre d'employés par ville
    $employeesByCity = Employe::selectRaw('city, COUNT(*) as count')
        ->groupBy('city')
        ->get();

    // Nombre d'employés par département
    $employeesByDepartment = Employe::selectRaw('depart, COUNT(*) as count')
        ->groupBy('depart')
        ->get();

    // Employés embauchés dans les 30 derniers jours
    $recentHires = Employe::where('hire_date', '>=', now()->subDays(30))->count();

    return view('employes.statistics', [
        'totalEmployees' => $totalEmployees,
        'employeesByCity' => $employeesByCity,
        'employeesByDepartment' => $employeesByDepartment,
        'recentHires' => $recentHires,
    ]);
}

public function requests()
{
    // Exemple : Récupérer les demandes des employés
    $requests = [
        ['type' => 'Vacation', 'status' => 'Approved', 'date' => '2025-04-20'],
        ['type' => 'Certificate', 'status' => 'Pending', 'date' => '2025-04-18'],
    ];

    return view('employes.requests', [
        'requests' => $requests,
    ]);
}
}
