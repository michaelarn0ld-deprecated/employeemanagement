<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Department;
use App\Models\State;
use Illuminate\Http\Request;
use PHPUnit\Framework\Constraint\Count;

class EmployeeDataController extends Controller
{
    public function countries(){
        $countries = Country::all();

        return response()->json($countries);
    }

    public function states($id){
        $country = Country::find($id);
        $states = $country->states;

        return response()->json($states);
    }

    public function cities($id){
        $state = State::find($id);
        $cities = $state->cities;

        return response()->json($cities);

    }

    public function departments(){
        $departments = Department::all();

        return response()->json($departments);
    }
}
