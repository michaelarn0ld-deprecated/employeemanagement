@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center text-bold">
                    <h2>
                        Welcome to the Employee Management System!
                    </h2>
                </div>

                <div class="card-body">
                    <h4 class="text-center mb-4">To test the application, please register a new account or use the following test credentials!</h4>
                    <p class="mb-3 text-center">User Email: admin@test.test</p>
                    <p class="mb-3 text-center">Password: admintest</p>
                    <div class="d-flex justify-content-center">
                        <a class="btn btn-success btn-lg m-2" href="{{ route('login') }}">{{ __('Login') }}</a>
                        <a class="btn btn-primary btn-lg m-2" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
