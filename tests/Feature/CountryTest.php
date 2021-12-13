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
                    'title' => 'Россия',
                    'iso_code' => 'RU'
                ]
            ]
        ]);

        $this->assertCount(1, Country::all());

        $country = Country::first();

        $this->assertEquals('Россия', $country-> title);
        $this->assertEquals('RU', $country->iso_code);

        $response->assertStatus(201)
            ->assertJson([
                'data' => [
                    'type' => 'countries',
                    'country_id' => $country->id,
                    'attributes' => [
                        'title' => $country->title,
                        'iso_code' => $country->iso_code,
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
                        'title' => $country->title,
                        'iso_code' => $country->iso_code,
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
                                'title' => $countries->first()->title,
                                'iso_code' => $countries->first()->iso_code,
                            ]
                        ]
                    ],
                    [
                        'data' => [
                            'type' => 'countries',
                            'country_id' => $countries->last()->id,
                            'attributes' => [
                                'title' => $countries->last()->title,
                                'iso_code' => $countries->last()->iso_code,
                            ]
                        ]
                    ],
                ]
            ]);

    }
}
