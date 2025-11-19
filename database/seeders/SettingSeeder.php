<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Settings;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Settings::create([
            'setting_name'=>'site_name',
            'value'=>'My E-Commerce Site'
        ]);

        Settings::create([
            'setting_name'=>'contact_email',
            'value'=>'support@ecommerce.com'
        ]);
    }
}
