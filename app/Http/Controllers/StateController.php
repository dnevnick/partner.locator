<?php

namespace App\Http\Controllers;

use App\Http\Resources\StateCollection;
use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;
use App\Http\Resources\State as StateResource;

class StateController extends Controller
{

    public function index()
    {
        return new StateCollection(State::all());
    }
    public function show(State $state)
    {
        return new StateResource($state);
    }

    public function store()
    {
        $validated = request()->validate([
            'data.attributes.name' => 'required',
            'data.attributes.short_name' => 'required',
            'data.relationships.country.data.country_id' => 'required',
        ]);

        $state = new State($validated['data']['attributes']);
        $state->country()->associate( Country::find($validated['data']['relationships']['country']['data']['country_id']));
        $state->save();

        return new StateResource($state);
    }
}
