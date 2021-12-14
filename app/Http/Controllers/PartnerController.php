<?php

namespace App\Http\Controllers;

use App\Http\Resources\PartnerCollection;
use App\Models\Country;
use App\Models\Partner;
use App\Models\PartnerType;
use App\Models\State;
use Illuminate\Http\Request;
use App\Http\Resources\Partner as PartnerResource;

class PartnerController extends Controller
{
    public function index()
    {
        return new PartnerCollection(Partner::all());
    }

    public function show(Partner $partner)
    {
        return new PartnerResource($partner);
    }

    public function store()
    {
        $validated = request()->validate([
            'data.attributes.company' => 'required',
            'data.attributes.logo' => 'required',
            'data.attributes.address' => 'required',
            'data.attributes.website' => 'required',
            'data.attributes.phone' => 'required',

            'data.relationships.partner_type.data.partner_type_id' => 'required|exists:partner_types,id',

            'data.relationships.countries.data' => 'array',
            'data.relationships.countries.data.*.data.country_id' => 'required|exists:countries,id',

            'data.relationships.states.data' => 'array',
            'data.relationships.states.data.*.data.state_id' => 'required|exists:states,id',

        ]);

        $partner = new Partner($validated['data']['attributes']);

        $partner->partnerType()->associate(PartnerType::find($validated['data']['relationships']['partner_type']['data']['partner_type_id']));
        $partner->save();

        foreach($validated['data']['relationships']['countries']['data'] as $country){
            $partner->countries()->attach(Country::find($country['data']['country_id']));
        }

        foreach($validated['data']['relationships']['states']['data'] as $state){
            $partner->states()->attach(State::find($state['data']['state_id']));
        }

        $partner->save();

        return new PartnerResource($partner);
    }
}
