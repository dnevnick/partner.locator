<?php

namespace Tests\Feature;

use App\Models\Country;
use App\Models\State;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StateTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function state_can_be_created()
    {
        $country = Country::factory()->create();

        $this->withoutExceptionHandling();

        $response = $this->post('/api/states', [
            'data' => [
                'attributes' => [
                    'name' => 'Свердловская',
                    'short_name' => 'BR'
                ],
                'relationships' => [
                    'country' => [
                        'data' => [
                            'country_id' => $country->id
                        ]
                    ]
                ]
            ]
        ]);

        $this->assertCount(1, State::all());

        $state = State::first();

        $this->assertEquals('Свердловская', $state->name);
        $this->assertEquals('BR', $state->short_name);
        $this->assertEquals($country->id, $state->country_id);

        $response->assertStatus(201)
            ->assertJson([
                'data' => [
                    'type' => 'states',
                    'state_id' => $state->id,
                    'attributes' => [
                        'name' => $state->name,
                        'short_name' => $state->short_name,
                    ],
                    'relationships' => [
                        'country' => [
                            'data' => [
                                'type' => 'countries',
                                'country_id' => $country->id,
                                'attributes' => [
                                    'name' => $country->name,
                                    'short_name' => $country->short_name,
                                ]
                            ]
                        ]
                    ]
                ]
            ]);


    }

    /** @test */
    public function single_state_can_be_fetched()
    {
        $this->withoutExceptionHandling();

        $state = State::factory()->create();

        $this->get('/api/states/'.$state->id)
            ->assertOk()
            ->assertJson([
                'data' => [
                    'type' => 'states',
                    'state_id' => $state->id,
                    'attributes' => [
                        'name' => $state->name,
                        'short_name' => $state->short_name,
                    ],
                    'relationships' => [
                        'country' => [
                            'data' => [
                                'type' => 'countries',
                                'country_id' => $state->country->id,
                                'attributes' => [
                                    'name' => $state->country->name,
                                    'short_name' => $state->country->short_name,
                                ]
                            ]
                        ]
                    ]
                ]
            ]);

    }

    /** @test */
    public function multiple_states_can_be_fetched()
    {
        $this->withoutExceptionHandling();

        $states = State::factory()->count(2)->create();

        $this->get('/api/states')
            ->assertOk()
            ->assertJson([
                'data' => [
                    [
                        'data' => [
                            'type' => 'states',
                            'state_id' => $states->first()->id,
                            'attributes' => [
                                'name' => $states->first()->name,
                                'short_name' => $states->first()->short_name,
                            ],
                            'relationships' => [
                                'country' => [
                                    'data' => [
                                        'type' => 'countries',
                                        'country_id' => $states->first()->country->id,
                                        'attributes' => [
                                            'name' => $states->first()->country->name,
                                            'short_name' => $states->first()->country->short_name,
                                        ]
                                    ]
                                ]
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
                            ],
                            'relationships' => [
                                'country' => [
                                    'data' => [
                                        'type' => 'countries',
                                        'country_id' => $states->last()->country->id,
                                        'attributes' => [
                                            'name' => $states->last()->country->name,
                                            'short_name' => $states->last()->country->short_name,
                                        ]
                                    ]
                                ]
                            ]
                        ]
                    ],
                ]
             ]);
    }
}
