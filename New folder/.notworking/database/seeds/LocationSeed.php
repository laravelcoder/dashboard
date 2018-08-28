<?php

use Illuminate\Database\Seeder;

class LocationSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'parent_website_id' => null, 'clinic_website_link' => null, 'clinic_id' => null, 'clinic_location_id' => null, 'nickname' => 'Affordable Programmer', 'contact_person_id' => null, 'address' => '795 baker dr', 'address_2' => '', 'city' => 'midvale', 'state' => 'ut', 'location_email' => null, 'phone' => '385-282-6160', 'phone2' => '', 'storefront' => null, 'google_map_link' => '795 E BAKER DR midvale utah 84047', 'created_by_id' => null,],
            ['id' => 2, 'parent_website_id' => 1, 'clinic_website_link' => null, 'clinic_id' => 1, 'clinic_location_id' => null, 'nickname' => 'LCA CORPORATE', 'contact_person_id' => 2, 'address' => '4850 S 154 E Myrtle Ave', 'address_2' => '#304', 'city' => 'Murray', 'state' => 'UT', 'location_email' => 'info@liceclinicsofamerica.com', 'phone' => '1-801-533-5423', 'phone2' => null, 'storefront' => null, 'google_map_link' => '4850, 154 E Myrtle Ave #304, Murray, UT 84107', 'created_by_id' => null,],
            ['id' => 3, 'parent_website_id' => 4, 'clinic_website_link' => 'https://www.liceclinicshawaii.com/maui/', 'clinic_id' => 2, 'clinic_location_id' => 5471, 'nickname' => 'MAUI', 'contact_person_id' => null, 'address' => '300 Ohukai Road', 'address_2' => 'Suite B-319', 'city' => 'Kihei', 'state' => 'HI', 'location_email' => 'info@liceclinicshawaii.com', 'phone' => '808 740 0055', 'phone2' => '', 'storefront' => null, 'google_map_link' => '300 Ohukai Road Suite B-319 Kihei, HI 96753', 'created_by_id' => null,],
            ['id' => 4, 'parent_website_id' => 4, 'clinic_website_link' => 'https://www.liceclinicshawaii.com/oahu/', 'clinic_id' => 2, 'clinic_location_id' => 13329, 'nickname' => 'OAHU', 'contact_person_id' => null, 'address' => '250 Ward Avenue', 'address_2' => 'Suite #209', 'city' => 'Honolulu', 'state' => 'HI', 'location_email' => 'info@liceclinicshawaii.com', 'phone' => '808 670 1008', 'phone2' => null, 'storefront' => null, 'google_map_link' => '250 Ward Avenue Suite #209 Honolulu, HI 96814', 'created_by_id' => null,],
            ['id' => 5, 'parent_website_id' => 5, 'clinic_website_link' => null, 'clinic_id' => 4, 'clinic_location_id' => 5237, 'nickname' => 'Pasadena', 'contact_person_id' => null, 'address' => '411 East Woodbury RD', 'address_2' => null, 'city' => 'Pasadena', 'state' => 'CA', 'location_email' => null, 'phone' => '626 542-1110', 'phone2' => null, 'storefront' => null, 'google_map_link' => '411 EAST WOODBURY ROAD  PASADENA, CA 91001', 'created_by_id' => 2,],

        ];

        foreach ($items as $item) {
            \App\Location::create($item);
        }
    }
}
