@extends('layouts.main')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Cities</h1>
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
                        <form action="{{ route('cities.index') }}" method="GET">
                            <div class="form-row align-items-center">
                                <div class="span6 input-large search-query">
                                    <input type="text" name="search" class="form-control w-100 mb-2" id="inlineFormInput" placeholder="Enter City Name: ">
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn btn-primary mb-2">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col">
                        <a href="{{ route('cities.create') }}" class="btn btn-primary mb-2 float-right">Create</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">State</th>
                        <th scope="col">Country</th>
                        <th scope="col">Manage</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cities as $city)
                        <tr>
                            <th scope="row">{{ $city->id }}</th>
                            <td>{{ $city->name }}</td>
                            <td>{{ $city->state->name }}</td>
                            <td>{{ $city->state->country->name }}</td>
                            <td>
                                <a 
                                    href="{{ route('cities.edit', $city) }}"
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