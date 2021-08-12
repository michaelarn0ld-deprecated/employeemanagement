@extends('layouts.main')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Countries</h1>
</div>

<div class="row">
    <div class="card mx-auto">
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <form action="{{ route('countries.index') }}" method="GET">
                        <div class="form-row align-items-center">
                            <div class="col">
                                <input type="text" name="search" class="form-control mb-2" id="inlineFormInput" placeholder="Enter countryname">
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-primary mb-2">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col">
                    <a href="{{ route('countries.create') }}" class="btn btn-primary mb-2 float-right">Create</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Country Name</th>
                    <th scope="col">Country Code</th>
                    <th scope="col">Manage</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($countries as $country)
                    <tr>
                        <th scope="row">{{ $country->id }}</th>
                        <td>{{ $country->name }}</td>
                        <td>{{ $country->country_code }}</td>
                        <td>
                            <a 
                                href="{{ route('countries.edit', $country) }}"
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