@extends('layouts.main')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            {{ $department->departments }}
        </h1>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Update Department Information') }}
                        <a href="{{ route('departments.index') }}" class="float-right">Back &rarr;</a>
                    </div>
    
                    <div class="card-body">
                        <form method="POST" action="{{ route('departments.update',$department)}}">
                            @csrf
                            @method('PUT')
    
                            <div class="form-group row">
                                <label for="departments" class="col-md-4 col-form-label text-md-right">{{ __('Department') }}</label>
    
                                <div class="col-md-6">
                                    <input id="departments" type="text" class="form-control @error('departments') is-invalid @enderror" name="departments" value="{{ $department->departments }}" required autocomplete="departments" autofocus>
    
                                    @error('departments')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

       
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Submit') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="m-2 p-2">
                    <form  
                        method="POST" 
                        action="{{ route('departments.destroy', $department) }}">
                        @csrf
                        @method('DELETE')
                        <button 
                            class="btn btn-danger" 
                            type="submit">Delete {{ $department->name }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>



@endsection