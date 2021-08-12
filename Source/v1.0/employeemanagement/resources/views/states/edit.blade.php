@extends('layouts.main')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            {{ $state->name }}
        </h1>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Update State Information') }}
                        <a href="{{ route('states.index') }}" class="float-right">Back &rarr;</a>
                    </div>
    
                    <div class="card-body">
                        <form method="POST" action="{{ route('states.update',$state)}}">
                            @csrf
                            @method('PUT')
    
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
    
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $state->name }}" required autocomplete="name" autofocus>
    
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>
    
                                <div class="col-md-6">

                                    <select name="country" id="country"
                                    class="form-control @error('country') is-invalid @enderror" >
                                        @foreach ($countries as $country )

                                            @if ($state->country->name == $country->name)
                                                <option 
                                                    selected 
                                                    value="{{ $country->id }}">
                                                    {{ $country->name }}
                                                </option>
                                            @else
                                                <option 
                                                value="{{ $country->id }}">
                                                    {{ $country->name }}
                                                </option>
                                            @endif
                                            
                                        @endforeach
                                    </select>
    
                                    @error('country')
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
                        action="{{ route('states.destroy', $state) }}">
                        @csrf
                        @method('DELETE')
                        <button 
                            class="btn btn-danger" 
                            type="submit">Delete {{ $state->name }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>



@endsection