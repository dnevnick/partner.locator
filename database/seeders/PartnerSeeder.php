<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\Partner;
use App\Models\State;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ["id" => "1", "company" => "Napole IT", "partner_type_id" => "2", "logo" => "https://img.netwrix.com/partner_logos/standard-logo-reseller-preferred.png", "address" => "8223 Molson Way, Liverpool, New York, United States, 13090", "website" => "https://example1.com", "phone" => "+777(315) 727-0303", "countries" => ["US"], "states" => ["NY"]],
            ["id" => "2", "company" => "123 srl", "partner_type_id" => "1", "logo" => "https://img.netwrix.com/partner_logos/standard-logo-managed-service-provider-new.png", "address" => "Viale dell’Industria, 50,Jesi (AN), Italy, 60035", "website" => "https://example2.com", "phone" => "7390731288064", "countries" => ["IT"], "states" => [""]],
            ["id" => "3", "company" => "Entioatsing Inc", "partner_type_id" => "1", "logo" => "https://img.netwrix.com/partner_logos/standard-logo-managed-service-provider-new.png", "address" => "10251 Trademark St Unit A, Rancho Cucamonga, California, United States, 91730", "website" => "https://example3.com", "phone" => "+777 909-257-7270", "countries" => ["US"], "states" => ["CA"]],
            ["id" => "4", "company" => "WeVlan", "partner_type_id" => "1", "logo" => "https://img.netwrix.com/partner_logos/standard-logo-managed-service-provider-new.png", "address" => "Via Ungaretti, 33, Montecorvino Pugliano (Sa), Italy, 84090", "website" => "https://example1.com", "phone" => "778281776820", "countries" => ["IT"], "states" => [""]],
            ["id" => "5", "company" => "ABA-IT", "partner_type_id" => "3", "logo" => "https://img.netwrix.com/partner_logos/standard-logo-reseller-premium.png", "address" => "112 Bureaux de la Colline, Saint Cloud Cedex, France, 92213", "website" => "https://example.com", "phone" => "+33 1 84 76 00 60", "countries" => ["FR"], "states" => [""]],
            ["id" => "6", "company" => "Sync", "partner_type_id" => "2", "logo" => "https://img.netwrix.com/partner_logos/standard-logo-reseller-preferred.png", "address" => "Houston, Texas, United States", "website" => "https://example2.com", "phone" => "(713) 299-5999", "countries" => ["US"], "states" => ["IL","NY","TX"]],
            ["id" => "7", "company" => "LLP", "partner_type_id" => "3", "logo" => "https://img.netwrix.com/partner_logos/standard-logo-reseller-premium.png", "address" => "107-111 Fleet Street, London, United Kingdom, EC4A 2AB", "website" => "https://example.com", "phone" => "773111005", "countries" => ["GB"], "states" => [""]],
            ["id" => "8", "company" => "BARTEA", "partner_type_id" => "3", "logo" => "https://img.netwrix.com/partner_logos/standard-logo-reseller-premium.png", "address" => "58 RUE JEAN DUVERT, BLANQUEFORT, France, 33290", "website" => "https://example3.com", "phone" => "+33 5 24 07 99 99", "countries" => ["FR"], "states" => [""]],
            ["id" => "9", "company" => "ITZafy", "partner_type_id" => "2", "logo" => "https://img.netwrix.com/partner_logos/standard-logo-reseller-preferred.png", "address" => "313 S Rohlwing Road, Addison, Illinois, United States, 60101", "website" => "https://example.com", "phone" => "+77(630) 396-6300", "countries" => ["US"], "states" => ["IL"]],
            ["id" => "10", "company" => "LELAYE55", "partner_type_id" => "3", "logo" => "https://img.netwrix.com/partner_logos/standard-logo-reseller-premium.png", "address" => "Avenida Dom Joao Segundo, Lote 42, Escritorio 602, Lisboa, Portugal, 1990-095", "website" => "https://example1.com", "phone" => "771218248480", "countries" => ["PT"], "states" => [""]],
            ["id" => "11", "company" => "Caribbean Products", "partner_type_id" => "1", "logo" => "https://img.netwrix.com/partner_logos/standard-logo-managed-service-provider-new.png", "address" => "P.O. Box 10015, Grand Cayman, Cayman Islands, KY1-1001", "website" => "https://example.com", "phone" => "+99(345) 916-2401", "countries" => ["AW","KY","GD","JM","TT"], "states" => [""]],
            ["id" => "12", "company" => "Professional software", "partner_type_id" => "1", "logo" => "https://img.netwrix.com/partner_logos/standard-logo-managed-service-provider-new.png", "address" => "Via Roma, 39, Campodarsego (PD), Italy, 35011", "website" => "https://example.com", "phone" => "7799657098", "countries" => ["IT"], "states" => [""]],
            ["id" => "13", "company" => "Segreguards GmbH", "partner_type_id" => "1", "logo" => "https://img.netwrix.com/partner_logos/standard-logo-managed-service-provider-new.png", "address" => "Marktstrasse 10, Vallendar, Germany, 56179", "website" => "https://example2.com", "phone" => "+77 960 986 00", "countries" => ["DE"], "states" => [""]],
            ["id" => "14", "company" => "SHUSDEC", "partner_type_id" => "2", "logo" => "https://img.netwrix.com/partner_logos/standard-logo-reseller-preferred.png", "address" => "ul. Bociana 22A, Krakow, Poland, 31-231", "website" => "https://example.com", "phone" => "(812)481235091", "countries" => ["PL"], "states" => [""]],
            ["id" => "15", "company" => "Local PC Ltd", "partner_type_id" => "2", "logo" => "https://img.netwrix.com/partner_logos/standard-logo-reseller-preferred.png", "address" => "Unit 7 / 950 Ferry Road, Christchurch, New Zealand, 8023", "website" => "https://example3.com", "phone" => "+123 03 961 7286", "countries" => ["NZ"], "states" => [""]],
            ["id" => "16", "company" => "Software & Services", "partner_type_id" => "5", "logo" => "https://img.netwrix.com/partner_logos/standard-logo-5-new.png", "address" => "Awans, Belgium", "website" => "https://example2.com", "phone" => "+7 (322) 204-0266", "countries" => ["BE"], "states" => [""]],
            ["id" => "17", "company" => "Electron", "partner_type_id" => "1", "logo" => "https://img.netwrix.com/partner_logos/standard-logo-managed-service-provider-new.png", "address" => "38251 S Groesbeck Hwy, Clinton Township,Michigan, United States, 48036", "website" => "https://example1.com", "phone" => "+1 (146) 757-1200 x5105", "countries" => ["US"], "states" => ["MI"]],
            ["id" => "18", "company" => "ICCD prods", "partner_type_id" => "5", "logo" => "https://img.netwrix.com/partner_logos/standard-logo-5-new.png", "address" => "5694 Mission Center Road, Ste 602, San Diego, California, United States, 92108", "website" => "https://example.com", "phone" => "+77 (858) 618-3870", "countries" => ["US"], "states" => ["CA"]],
            ["id" => "19", "company" => "COMMAS-Techline", "partner_type_id" => "4", "logo" => "https://img.netwrix.com/partner_logos/standard-logo-reseller-elite.png", "address" => "ул. Яшина, д. 40, Хабаровск, Russian Federation", "website" => "https://example.com", "phone" => "+7 (4212) 99-46-99", "countries" => ["RU"], "states" => [""]],
            ["id" => "20", "company" => "XIREL BG Ltd.", "partner_type_id" => "5", "logo" => "https://img.netwrix.com/partner_logos/standard-logo-5-new.png", "address" => "1712 , Mladost 3, bl. 306, ent.2, Sofia, Bulgaria", "website" => "https://example3.com", "phone" => "777888329043", "countries" => ["BG"], "states" => [""]],
            ["id" => "21", "company" => "Seretyus", "partner_type_id" => "1", "logo" => "https://img.netwrix.com/partner_logos/standard-logo-managed-service-provider-new.png", "address" => "760 NE Hazel Dell Ave, Vancouver, United States", "website" => "https://example2.com", "phone" => "7772183883", "countries" => ["US"], "states" => ["CA","WA"]],
            ["id" => "22", "company" => "Dimension Values", "partner_type_id" => "1", "logo" => "https://img.netwrix.com/partner_logos/standard-logo-managed-service-provider-new.png", "address" => "Bryanston, Botswana", "website" => "https://example1.com", "phone" => "1236772510387", "countries" => ["BW"], "states" => [""]],
            ["id" => "23", "company" => "DAD d.o.o.", "partner_type_id" => "3", "logo" => "https://img.netwrix.com/partner_logos/standard-logo-reseller-premium.png", "address" => "Tbilisijska 85, Ljubljana, Slovenia", "website" => "https://example.com", "phone" => "98744790011", "countries" => ["SI"], "states" => [""]],
            ["id" => "24", "company" => "KINSST", "partner_type_id" => "5", "logo" => "https://img.netwrix.com/partner_logos/standard-logo-5-new.png", "address" => "17503 Burbank Blvd, Encino, United States", "website" => "https://example3.com", "phone" => "+7 855-4482178", "countries" => ["US"], "states" => ["CA"]],
            ["id" => "25", "company" => "Communications Russia", "partner_type_id" => "5", "logo" => "https://img.netwrix.com/partner_logos/standard-logo-5-new.png", "address" => "Трехпрудный пер., д. 9, стр. 2, БЦ Трехпрудный, оф. 303-305, Москва, Russian Federation", "website" => "https://example.com", "phone" => "+7 (312) 664-23-56", "countries" => ["RU"], "states" => [""]],
            ["id" => "26", "company" => "Service Srl", "partner_type_id" => "1", "logo" => "https://img.netwrix.com/partner_logos/standard-logo-managed-service-provider-new.png", "address" => "Italy, 50145", "website" => "https://example2.com", "phone" => "775155095", "countries" => ["IT"], "states" => [""]],
            ["id" => "27", "company" => "Derersedia", "partner_type_id" => "4", "logo" => "https://img.netwrix.com/partner_logos/standard-logo-reseller-elite.png", "address" => "France", "website" => "https://example3.com", "phone" => "77632908453", "countries" => ["FR"], "states" => [""]],
            ["id" => "28", "company" => "Guringer GmbH", "partner_type_id" => "4", "logo" => "https://img.netwrix.com/partner_logos/standard-logo-reseller-elite.png", "address" => "Schulhausstrasse, Switzerland", "website" => "https://example.com", "phone" => "+7 (0)43 843 23 45", "countries" => ["CH"], "states" => [""]],
            ["id" => "29", "company" => "HeavyMesh", "partner_type_id" => "5", "logo" => "https://img.netwrix.com/partner_logos/standard-logo-5-new.png", "address" => "20 Camden St, Suite 200, Toronto, Ontario, Canada", "website" => "https://example1.com", "phone" => "(995) 64789675", "countries" => ["CA"], "states" => ["ON"]],
            ["id" => "30", "company" => "ABCSoft Voronezh", "partner_type_id" => "5", "logo" => "https://img.netwrix.com/partner_logos/standard-logo-5-new.png", "address" => "ул. Кривошеина, 9, Воронеж, Russian Federation", "website" => "https://example.com", "phone" => "+7 (812) 239-30-50", "countries" => ["RU"], "states" => [""]],
            ["id" => "31", "company" => "Wise Srl", "partner_type_id" => "4", "logo" => "https://img.netwrix.com/partner_logos/standard-logo-reseller-elite.png", "address" => "Via della Borsa, 1/a, Castelfranco Veneto, Italy, 31033", "website" => "https://example.com", "phone" => "777423723453", "countries" => ["IT"], "states" => [""]],
            ["id" => "32", "company" => "Development Point", "partner_type_id" => "5", "logo" => "https://img.netwrix.com/partner_logos/standard-logo-5-new.png", "address" => "17 Avenida 19-70 Zona 10 Edificio Torino, Nivel 12 Oficina 1207, Guatemala City, Guatemala", "website" => "https://example2.com", "phone" => "-6290", "countries" => ["CR","GT"], "states" => [""]],
            ["id" => "33", "company" => "Pushton Technology", "partner_type_id" => "1", "logo" => "https://img.netwrix.com/partner_logos/standard-logo-managed-service-provider-new.png", "address" => "23625 Commerce Park, #130, Beachwood, United States", "website" => "https://example3.com", "phone" => "+7 (216) 223-7016", "countries" => ["US"], "states" => ["OH"]],
            ["id" => "34", "company" => "SQLSS", "partner_type_id" => "2", "logo" => "https://img.netwrix.com/partner_logos/standard-logo-reseller-preferred.png", "address" => "Unit 15 Pavillion Business Park, Leeds, United Kingdom", "website" => "https://example.com", "phone" => "3454591995", "countries" => ["GB"], "states" => [""]],
            ["id" => "35", "company" => "Xirel High", "partner_type_id" => "2", "logo" => "https://img.netwrix.com/partner_logos/standard-logo-reseller-preferred.png", "address" => "Mladost 1, bl. 54, Sofia, Bulgaria", "website" => "https://example1.com", "phone" => "773396763", "countries" => ["BG"], "states" => [""]],
            ["id" => "36", "company" => "4B Tech, PT.", "partner_type_id" => "4", "logo" => "https://img.netwrix.com/partner_logos/standard-logo-reseller-elite.png", "address" => "Jl. Engku Putri, Komp. Ruko Purimas, blok A-7, Batam Center, Kepri-29400, Indonesia", "website" => "https://example3.com", "phone" => "777127033322", "countries" => ["ID","SG"], "states" => [""]],
            ["id" => "37", "company" => "Checkpoint", "partner_type_id" => "2", "logo" => "https://img.netwrix.com/partner_logos/standard-logo-reseller-preferred.png", "address" => "4120 Rio Bravo Suite 215, El Paso, United States", "website" => "https://example2.com", "phone" => "(915)-581-9999", "countries" => ["US"], "states" => ["TX"]],
            ["id" => "38", "company" => "MMMD Srl", "partner_type_id" => "2", "logo" => "https://img.netwrix.com/partner_logos/standard-logo-reseller-preferred.png", "address" => "Via P. Borsellino 2, Reggio Emilia, Italy", "website" => "https://example1.com", "phone" => "1366646046", "countries" => ["IT"], "states" => [""]],
            ["id" => "39", "company" => "Security Chile", "partner_type_id" => "2", "logo" => "https://img.netwrix.com/partner_logos/standard-logo-reseller-preferred.png", "address" => "Lavalle 1675, piso 4 oficina 5, Buenos Aires, Argentina", "website" => "https://example1.com", "phone" => "+54 11 5039999", "countries" => ["AR"], "states" => [""]],

        ];

        foreach($data as $item){
            $countries = $item['countries'];
            $states = $item['states'];

            $item = Arr::except($item, ['countries', 'states']);

            $partner = Partner::create($item);

            foreach($countries as $country){
                $partner->countries()->attach(Country::where(['short_name' => $country])->first());
            }

            foreach($states as $state){
                $partner->states()->attach(State::where(['short_name' => $state])->first());
            }



        }


    }
}
