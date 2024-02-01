<?php

namespace Database\Seeders;

use App\Models\Attribute;
use Illuminate\Database\Seeder;

class ValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $attribute = Attribute::find(1);

        $attribute->values()->create([
            'name' => [
                'uz' => 'Qizil',
                'ru' => 'Красный'
            ]
        ]);

        $attribute->values()->create([
            'name' => [
                'uz' => 'Qora',
                'ru' => 'Черный'
            ]
        ]);

        $attribute->values()->create([
            'name' => [
                'uz' => 'Jigarrang',
                'ru' => 'Коричневий'
            ]
        ]);

        $attribute = Attribute::find(2);


        $attribute->values()->create([
            'name' => [
                'uz' => 'MDF',
                'ru' => 'МДФ'
            ]
        ]);

        $attribute->values()->create([
            'name' => [
                'uz' => 'LDSP',
                'ru' => 'ЛДСП'
            ]
        ]);
    }
}
