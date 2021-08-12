<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;
use App\Http\Requests\StateStoreRequest;
use App\Http\Requests\StateUpdateRequest;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $states = State::all();

        if ($request->has('search')){
            $states = State::where('name','like',"%{$request->search}%")->get();
        }

        return view('states.index',[
            'states' => $states
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        
        return view('states.create', [
            'countries' => $countries
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StateStoreRequest $request)
    {
        State::create([
            'name' => $request->input('name'),
            'country_id' => $request->input('country')
        ]);

        return redirect()
            ->route('states.index')
            ->with('message', 'State was successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(State $state)
    {

        $countries = Country::all();

        return view('states.edit', [
                'countries' => $countries,
                'state' => $state
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StateUpdateRequest $request, State $state)
    {
        $state->update([
            'name' => $request->name,
            'country_id' => $request->country
        ]);

        return redirect()
        ->route('states.index')
        ->with('message', 'State was successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(State $state)
    {
        $state->delete();


        return redirect()
        ->route('states.index')
        ->with('message', 'State was successfully deleted');
    }
}
