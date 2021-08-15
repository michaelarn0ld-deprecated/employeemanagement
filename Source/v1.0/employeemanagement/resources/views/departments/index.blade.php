@extends('layouts.main')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Departments</h1>
</div>

<div class="row">
    <div class="card mx-auto" style="width: 60%">
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <form action="{{ route('departments.index') }}" method="GET">
                        <div class="form-row align-items-center">
                            <div class="span6 input-large search-query">
                                <input type="text" name="search" class="form-control w-100 mb-2" id="inlineFormInput" placeholder="Enter department Name: ">
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-primary mb-2">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col">
                    <a href="{{ route('departments.create') }}" class="btn btn-primary mb-2 float-right">Create</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Department Name</th>
                    <th scope="col">Manage</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($departments as $department)
                    <tr>
                        <th scope="row">{{ $department->id }}</th>
                        <td>{{ $department->departments }}</td>
                        <td>
                            <a 
                                href="{{ route('departments.edit', $department) }}"
                                class="btn btn-success">
                                Edit
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
    
@endsection