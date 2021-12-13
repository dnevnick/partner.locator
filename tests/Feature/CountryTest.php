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
}
