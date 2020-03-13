<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Setting::create([
            'company_name' =>'Nugsoft Office Mgt System',
            'company_contact' =>'0702499649',
            'company_email' =>'nugsoft@gmail.com',
            'company_logo'  => '/uploads/avatars/logo.png',
            'company_address' =>'Kyanja, Kampala',
            'company_description'  => "Let's do I.T. for You",
            'user_id'=> 1
        ]);
    }
}
