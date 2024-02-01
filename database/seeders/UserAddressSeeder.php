<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserAddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::find(2)->addresses()->create([
            'latitude' => '41.309755',
            'longitude' => '69.284928',
            'region' => 'Tashkent',
            'district' => 'Yashnobod tuman',
            'street' => 'Tuzel-1',
            'home' => '9',
        ]);

        User::find(2)->addresses()->create([
            'latitude' => '41.309755',
            'longitude' => '69.284928',
            'region' => 'Tashkent',
            'district' => 'Mirzo. U tuman',
            'street' => 'Navbahor mahallah',
            'home' => '123',
        ]);
    }
}
