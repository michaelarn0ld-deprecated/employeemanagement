<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\Department;
use App\Models\Employee;
use App\Models\State;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $employees = Employee::all();
        $employeeCount = $employees->count();

        $departments = Department::all();
        $departmentCount = $departments->count();

        $employeeDepartments = [];
        foreach($employees as $employee){
            if (!in_array($employee->department, $employeeDepartments)){
                array_push($employeeDepartments, $employee->department);
            }
        }
        $employeeDepartmentsCount = count($employeeDepartments);


        $countries = Country::all();
        $countryCount = $countries->count();

        $states = State::all();
        $stateCount = $states->count();

        $cities = City::all();
        $cityCount = $cities->count();

        $users = User::all();
        $userCount = $users->count();



        return view('home',[
            'employeeCount' => $employeeCount,
            'departmentCount' => $departmentCount,
            'employeeDepartmentsCount' => $employeeDepartmentsCount,
            'countryCount' => $countryCount,
            'stateCount' => $stateCount,
            'cityCount' => $cityCount,
            'userCount' => $userCount
        ]);
    }
}
