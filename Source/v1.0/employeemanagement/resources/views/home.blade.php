@extends('layouts.main')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8 mb-5">
        <div class="card">
            <div class="card-header text-center text-bold">
                <h1>
                    Employee Management
                </h1>
            </div>

            <div class="card-body">
                <h4 class="mb-3 text-center">There are currently {{ $employeeCount }}{{ ' ' }}employees across {{ $employeeDepartmentsCount }}{{ ' ' }}departments</h4>
                <div class="d-flex justify-content-center">
                    <a class="btn btn-success btn-lg m-2" href="/employees">Go to Employees</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8 mb-5">
        <div class="card">
            <div class="card-header text-center text-bold">
                <h1>
                    System Management
                </h1>
            </div>

            <div class="card-body">
                <h4 class="mb-3 text-center">There are currently {{ $countryCount }}{{ ' ' }} countries in the system</h4>
                <h4 class="mb-3 text-center">There are currently {{ $cityCount }}{{ ' ' }} cities in the system</h4>
                <h4 class="mb-3 text-center">There are currently {{$stateCount  }}{{ ' ' }}states in the system</h4>
                <h4 class="mb-3 text-center">There are currently {{$departmentCount  }}{{ ' ' }}departments in the system</h4>
                <div class="d-flex justify-content-center">
                    <a class="btn btn-success m-2" href="{{ route('countries.index') }}">Go to Countries</a>
                    <a class="btn btn-success m-2" href="{{ route('states.index') }}">Go to States</a>
                    <a class="btn btn-success m-2" href="{{ route('cities.index') }}">Go to Cities</a>
                    <a class="btn btn-success m-2" href="{{ route('departments.index') }}">Go to Departments</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8 mb-5">
        <div class="card">
            <div class="card-header text-center text-bold">
                <h1>
                    User Management
                </h1>
            </div>

            <div class="card-body">
                <h4 class="mb-3 text-center">There are currently {{ $userCount }}{{ ' ' }}registered users</h4>
                <div class="d-flex justify-content-center">
                    <a class="btn btn-success btn-lg m-2" href="{{ route('users.index') }}">Go to Users</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
