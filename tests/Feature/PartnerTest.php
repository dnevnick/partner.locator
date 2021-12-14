<?php

namespace Tests\Feature;

use App\Models\Country;
use App\Models\Partner;
use App\Models\PartnerType;
use App\Models\State;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PartnerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function partner_can_be_created()
    {
        $this->withoutExceptionHandling();

        $partnerType = PartnerType::factory()->create();
        $countries = Country::factory()->count(2)->create();
        $states = State::factory()->count(2)->create();

        $response = $this->post('/api/partners', [
            'data' => [
                'type' => 'partners',
                'attributes' => [
                    'company' => 'Napole IT',
                    'logo' => 'https://img.netwrix.com/partner_logos/standard-logo-reseller-preferred.png',
                    'address' => '8223 Molson Way, Liverpool, New York, United States, 13090',
                    'website' => 'https://example1.com',
                    'phone' => '+777(315) 727-0303'
                ],
                'relationships' => [
                    'partner_type' => [
                        'type' => 'partner-types',
                        'data' => [
                            'partner_type_id' => $partnerType->id,
                        ]
                    ],
                    'countries' => [
                        'data' => [
                            [
                                'data' => [
                                    'type' => 'countries',
                                    'country_id' => $countries->first()->id,

                                ]
                            ],
                            [
                                'data' => [
                                    'type' => 'countries',
                                    'country_id' => $countries->last()->id,
                                ]
                            ]
                        ]
                    ],
                    'states' => [
                        'data' => [
                            [
                                'data' => [
                                    'type' => 'states',
                                    'state_id' => $states->first()->id,
                                ]
                            ],
                            [
                                'data' => [
                                    'type' => 'states',
                                    'state_id' => $states->last()->id,
                                ]
                            ],
                        ]
                    ]
                ]
            ]
        ]);

        $this->assertCount(1, Partner::all());

        $partner = Partner::first();

        $this->assertEquals('Napole IT', $partner->company);
        $this->assertEquals('https://img.netwrix.com/partner_logos/standard-logo-reseller-preferred.png' , $partner->logo);
        $this->assertEquals('8223 Molson Way, Liverpool, New York, United States, 13090' , $partner->address);
        $this->assertEquals('https://example1.com' , $partner->website);
        $this->assertEquals('+777(315) 727-0303' , $partner->phone);

        $response->assertStatus(201)
            ->assertJson([
                'data' => [
                    'type' => 'partners',
                    'attributes' => [
                        'company' => $partner->company,
                        'logo' => $partner->logo,
                        'address' => $partner->address,
                        'website' => $partner->website,
                        'phone' => $partner->phone,
                    ],
                    'relationships' => [
                        'partner_type' => [
                            'data' => [
                                'type' => 'partner-types',
                                'partner_type_id' => $partnerType->id,
                                'attributes' => [
                                    'title' => $partnerType->title,
                                ]
                            ]
                        ],
                        'countries' => [
                            'data' => [
                                [
                                    'data' => [
                                        'type' => 'countries',
                                        'country_id' => $countries->first()->id,
                                        'attributes' => [
                                            'name' => $countries->first()->name,
                                            'short_name' => $countries->first()->short_name,
                                        ]

                                    ]
                                ],
                                [
                                    'data' => [
                                        'type' => 'countries',
                                        'country_id' => $countries->last()->id,
                                        'attributes' => [
                                            'name' => $countries->last()->name,
                                            'short_name' => $countries->last()->short_name,
                                        ]
                                    ]
                                ]
                            ]
                        ],
                        'states' => [
                            'data' => [
                                [
                                    'data' => [
                                        'type' => 'states',
                                        'state_id' => $states->first()->id,
                                        'attributes' => [
                                            'name' => $states->first()->name,
                                            'short_name' => $states->first()->short_name,
                                        ]
                                    ]
                                ],
                                [
                                    'data' => [
                                        'type' => 'states',
                                        'state_id' => $states->last()->id,
                                        'attributes' => [
                                            'name' => $states->last()->name,
                                            'short_name' => $states->last()->short_name,
                                        ]
                                    ]
                                ],
                            ]
                        ]
                    ]
                ]
            ]);

    }

    /** @test */
    public function single_partner_can_be_fetched()
    {
        $this->withoutExceptionHandling();

        $partner = Partner::factory()->create();

        $state = State::factory()->create();
        $country = Country::factory()->create();

        $partner->countries()->attach($country);
        $partner->states()->attach($state);

        $this->get('/api/partners/'.$partner->id)
        ->assertOk()
        ->assertJson([
            'data' => [
                'type' => 'partners',
                'attributes' => [
                    'company' => $partner->company,
                    'logo' => $partner->logo,
                    'address' => $partner->address,
                    'website' => $partner->website,
                    'phone' => $partner->phone,
                ],
                'relationships' => [
                    'partner_type' => [
                        'data' => [
                            'partner_type_id' => $partner->partnerType->id
                        ]
                    ],
                    'countries' => [
                        'data' => [
                            [
                                'data' => [
                                    'type' => 'countries',
                                    'country_id' => $country->id,
                                ]
                            ]
                        ]
                    ],
                    'states' => [
                        'data' => [
                            [
                                'data' => [
                                    'type' => 'states',
                                    'state_id' => $state->id,
                                ]
                            ]
                        ]
                    ],
                ]
            ]
        ]);
    }

    /** @test */
    public function multiple_partners_can_be_fetched()
    {
        $this->withoutExceptionHandling();

        $partners = Partner::factory()->count(2)->create();

        $state = State::factory()->create();
        $country = Country::factory()->create();

        $partners->first()->countries()->attach($country);
        $partners->last()->countries()->attach($country);

        $partners->first()->states()->attach($state);
        $partners->last()->states()->attach($state);

        $this->get('/api/partners')
            ->assertOk()
            ->assertJson([
                'data' => [
                    [
                        'data' => [
                            'type' => 'partners',
                            'attributes' => [
                                'company' => $partners->first()->company,
                                'logo' => $partners->first()->logo,
                                'address' => $partners->first()->address,
                                'website' => $partners->first()->website,
                                'phone' => $partners->first()->phone,
                            ],
                            'relationships' => [
                                'partner_type' => [
                                    'data' => [
                                        'partner_type_id' => $partners->first()->partnerType->id
                                    ]
                                ],
                                'countries' => [
                                    'data' => [
                                        [
                                            'data' => [
                                                'type' => 'countries',
                                                'country_id' => $country->id,
                                            ]
                                        ]
                                    ]
                                ],
                                'states' => [
                                    'data' => [
                                        [
                                            'data' => [
                                                'type' => 'states',
                                                'state_id' => $state->id,
                                            ]
                                        ]
                                    ]
                                ],
                            ]
                        ]
                    ],
                    [
                        'data' => [
                            'type' => 'partners',
                            'attributes' => [
                                'company' => $partners->last()->company,
                                'logo' => $partners->last()->logo,
                                'address' => $partners->last()->address,
                                'website' => $partners->last()->website,
                                'phone' => $partners->last()->phone,
                            ],
                            'relationships' => [
                                'partner_type' => [
                                    'data' => [
                                        'partner_type_id' => $partners->last()->partnerType->id
                                    ]
                                ],
                                'countries' => [
                                    'data' => [
                                        [
                                            'data' => [
                                                'type' => 'countries',
                                                'country_id' => $country->id,
                                            ]
                                        ]
                                    ]
                                ],
                                'states' => [
                                    'data' => [
                                        [
                                            'data' => [
                                                'type' => 'states',
                                                'state_id' => $state->id,
                                            ]
                                        ]
                                    ]
                                ],
                            ]
                        ]
                    ],
                ]
            ]);
    }
}
