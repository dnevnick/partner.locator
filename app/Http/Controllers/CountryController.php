<?php

namespace App\Http\Controllers;

use App\Http\Resources\CountryCollection;
use App\Models\Country;
use App\Http\Resources\Country as CountryResource;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index()
    {
        return new CountryCollection(Country::all());
    }

    public function show(Country $country)
    {
        return new CountryResource($country);
    }

    public function store()
    {
        $validated = request()->validate([
            'data.attributes.name' => 'required',
            'data.attributes.short_name' => 'required',
        ]);

        $country = Country::create($validated['data']['attributes']);

        return new CountryResource($country);

    }
}
