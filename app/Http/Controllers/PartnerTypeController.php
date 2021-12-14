<?php

namespace App\Http\Controllers;

use App\Http\Resources\PartnerTypeCollection;
use App\Models\PartnerType;
use App\Http\Resources\PartnerType as PartnerTypeResource;
use Illuminate\Http\Request;

class PartnerTypeController extends Controller
{

    public function index()
    {
        return new PartnerTypeCollection(PartnerType::all());
    }
    public function show(PartnerType $partnerType)
    {
        return new PartnerTypeResource($partnerType);
    }

    public function store()
    {
        $validated = request()->validate([
            'data.attributes.title' => 'required',
        ]);

        return new PartnerTypeResource(PartnerType::create($validated['data']['attributes']));
    }
}
