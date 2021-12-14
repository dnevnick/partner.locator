<?php

namespace Tests\Feature;

use App\Models\PartnerType;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PartnerTypeTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function partner_type_can_be_created()
    {
        $this->withoutExceptionHandling();

        $response = $this->post('/api/partner-types/', [
            'data' => [
                'type' => 'partner-types',
                'attributes' => [
                    'title' => 'Preferred Partner'
                ]
            ]
        ]);

        $this->assertCount(1, PartnerType::all());

        $partnerType = PartnerType::first();

        $this->assertEquals('Preferred Partner', $partnerType->title);

        $response->assertStatus(201)
            ->assertJson([
                'data' => [
                    'type' => 'partner-types',
                    'partner_type_id' => $partnerType->id,
                    'attributes' => [
                        'title' => $partnerType->title,
                    ]
                ]
            ]);

    }

    /** @test */
    public function single_partner_type_can_be_fetched()
    {
        $this->withoutExceptionHandling();

        $partnerType = PartnerType::factory()->create();

        $this->get('/api/partner-types/'.$partnerType->id)
            ->assertOk()
            ->assertJson([
                'data' => [
                    'type' => 'partner-types',
                    'partner_type_id' => $partnerType->id,
                    'attributes' => [
                        'title' => $partnerType->title,
                    ]
                ]
            ]);
    }

    /** @test */
    public function multiple_partner_types_can_be_fetched()
    {
        $this->withoutExceptionHandling();

        $partnerTypes = PartnerType::factory()->count(2)->create();

        $this->get('/api/partner-types')
            ->assertOk()
            ->assertJson([
                'data' => [
                    [
                        'data' => [
                            'type' => 'partner-types',
                            'partner_type_id' => $partnerTypes->first()->id,
                            'attributes' => [
                                'title' => $partnerTypes->first()->title,
                            ]
                        ]
                    ],
                    [
                        'data' => [
                            'type' => 'partner-types',
                            'partner_type_id' => $partnerTypes->last()->id,
                            'attributes' => [
                                'title' => $partnerTypes->last()->title,
                            ]
                        ]
                    ],
                ]
            ]);
    }
}
