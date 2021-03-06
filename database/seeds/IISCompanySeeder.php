<?php

use Illuminate\Database\Seeder;
use App\Company;
use App\Role;

class IISCompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::create([
            'type' => 'Company',
            'name' => 'Innovative Internet Solutions',
            'address_1' => '4901 SW 74th Ct',
            'address_2' => '',
            'city' => 'Miami',
            'state' => 'FL',
            'zip' => '33155',
            'phone' => '305-665-2500',
            'fax' => '305-665-2551',
            'website' => 'innovativeinternet.com',
            'domain' => 'innovativeinternet.com',
            'time_zone' => 'EST',
            'external_account' => '',
            'contact_first_name' => 'Jack',
            'contact_last_name' => 'Sasportas',
            'contact_phone' => '',
            'contact_email' => 'jack@innovativeinternet.com',
            'note' => 'Main/Root account',
            'active' => '1',
        ]);
    }
}
