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
        $data = request()->validate([
            'data.attributes.title' => 'required',
            'data.attributes.iso_code' => 'required',
        ]);

        $country = Country::create([
            'title' => $data['data']['attributes']['title'],
            'iso_code' => $data['data']['attributes']['iso_code']
        ]);

        return new CountryResource($country);

    }
}
