<?php

namespace Database\Factories;

use App\Models\PartnerType;
use Illuminate\Database\Eloquent\Factories\Factory;

class PartnerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'partner_type_id' => PartnerType::factory(),
            'company' => $this->faker->name,
            'logo' => $this->faker->url,
            'address' => $this->faker->address,
            'website' => $this->faker->url,
            'phone' => $this->faker->phoneNumber,
        ];
    }
}
