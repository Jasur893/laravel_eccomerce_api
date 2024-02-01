<?php

namespace Database\Seeders;

use App\Enums\SettingType;
use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $setting = Setting::create([
            'name' => [
                'uz' => 'Til',
                'ru' => 'Язык',
            ],
            'type' => SettingType::SELECT->value,
        ]);
        $setting->values()->create([
            'name' => [
                'uz' => 'Ozbekcha',
                'ru' => 'Ozbekcha'
            ]
        ]);
        $setting->values()->create([
            'name' => [
                'uz' => 'Ruscha',
                'ru' => 'Русский'
            ]
        ]);


        $setting = Setting::create([
            'name' => [
                'uz' => 'Pul birligi',
                'ru' => 'Pul birligi',
            ],
            'type' => SettingType::SELECT->value,
        ]);
        $setting->values()->create([
            'name' => [
                'uz' => 'So\'m',
                'ru' => 'Сум'
            ]
        ]);
        $setting->values()->create([
            'name' => [
                'uz' => 'Dollor',
                'ru' => 'Доллор'
            ]
        ]);


        $setting = Setting::create([
            'name' => [
                'uz' => 'Dark Mode',
                'ru' => 'Dark Mode ru',
            ],
            'type' => SettingType::SWITCH->value,
        ]);

        $setting = Setting::create([
            'name' => [
                'uz' => 'Xabarnomalar',
                'ru' => 'Xabarnomalar ru',
            ],
            'type' => SettingType::SWITCH->value,
        ]);
    }
}
