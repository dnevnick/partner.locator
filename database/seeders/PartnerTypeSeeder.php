<?php

namespace Database\Seeders;

use App\Models\PartnerType;
use Illuminate\Database\Seeder;

class PartnerTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ["id" => "1", "title" => "MSP Partner"],
            ["id" => "2", "title" => "Preferred Partner"],
            ["id" => "3", "title" => "Premium Partner"],
            ["id" => "4", "title" => "Elite Partner"],
            ["id" => "5", "title" => "Distributor"],
        ];

        foreach ($data as $partnerType){
            PartnerType::create($partnerType);
        }
    }
}
