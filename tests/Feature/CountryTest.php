<?php

namespace Tests\Feature;

use App\Models\Country;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CountryTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function country_can_be_created()
    {
        $this->withoutExceptionHandling();

        $response = $this->post('/api/countries', [
            'data' => [
                'attributes' => [
                    'name' => 'Россия',
                    'short_name' => 'RU'
                ]
            ]
        ]);

        $this->assertCount(1, Country::all());

        $country = Country::first();

        $this->assertEquals('Россия', $country->name);
        $this->assertEquals('RU', $country->short_name);

        $response->assertStatus(201)
            ->assertJson([
                'data' => [
                    'type' => 'countries',
                    'country_id' => $country->id,
                    'attributes' => [
                        'name' => $country->name,
                        'short_name' => $country->short_name,
                    ]
                ]
            ]);
    }

    /** @test */
    public function single_country_can_be_fetched()
    {
        $this->withoutExceptionHandling();

        $country = Country::factory()->create();

        $this->get('/api/countries/'.$country->id)
            ->assertOk()
            ->assertJson([
                'data' => [
                    'type' => 'countries',
                    'country_id' => $country->id,
                    'attributes' => [
                        'name' => $country->name,
                        'short_name' => $country->short_name,
                    ]
                ]
            ]);

    }

    /** @test */
    public function multiple_countries_can_be_fetched()
    {
        $this->withoutExceptionHandling();

        $countries = Country::factory()->count(2)->create();

        $this->get('/api/countries')
            ->assertOk()
            ->assertJson([
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
                    ],
                ]
            ]);

    }
}
