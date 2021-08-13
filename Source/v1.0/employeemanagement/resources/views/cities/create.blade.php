@extends('layouts.main')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Cities</h1>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Add New City') }}</div>
    
                    <div class="card-body">
                        <form method="POST" action="{{ route('cities.store') }}">
                            @csrf
    
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
    
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
    
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
                                    class="form-control @error('country') is-invalid @enderror">
                                        @foreach ($countries as $country )
                                            <option value="{{ $country->id }}">
                                                {{ $country->name }}
                                            </option>
                                        @endforeach
                                    </select>
    
                                    @error('country')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="state" class="col-md-4 col-form-label text-md-right">{{ __('State') }}</label>
    
                                <div class="col-md-6">

                                    <select name="state" id="state"
                                    class="form-control @error('state') is-invalid @enderror">

                                    {{-- Using Javascript to render state options based on country choice --}}

                                    </select>

                                </div>
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
            </div>
        </div>
    </div>

    <?php 
        for($i = 0; $i < count($countries); $i++){
            $countries[$i]->states = $countries[$i]->states;
        }
    ?>

    <script>

        countries = {!! json_encode($countries, JSON_HEX_TAG) !!}
        console.log(countries)

        let jsonCountries = {}

        for (let country of countries){
            let states = country.states
            states.forEach((state,idx) => {
                return states[idx] = {
                    name: state.name,
                    id: state.id
                }
            })

            jsonCountries[country.id] = states
        }

        console.log(jsonCountries)

        let countryChoice = document.getElementById('country')
        let stateNode = document.getElementById('state')
        let states = jsonCountries[countryChoice.value]
        for (let state of states){
            let optionText = document.createTextNode(`${state.name}`)
            let stateOption = document.createElement('option')
            stateOption.appendChild(optionText)
            stateOption.value = state.id
            stateNode.appendChild(stateOption)
        }

        countryChoice.addEventListener('change',
            function() {
                    stateNode.querySelectorAll('option')
                        .forEach(option => option.remove())
                    countryChoice = this
                    states = jsonCountries[countryChoice.value]
                    for (let state of states){
                        let optionText = document.createTextNode(state.name)
                        let stateOption = document.createElement('option')
                        stateOption.appendChild(optionText)
                        stateOption.value = state.id
                        stateNode.appendChild(stateOption)
                    }
                })

    </script>



@endsection