<?php

use Illuminate\Database\Seeder;
use App\Alternative;

class AlternativeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $alternatives = [
            [
                'alternative_code' => 'A1',
                'alternative_name' => 'Samsung',
            ],
            [
                'alternative_code' => 'A2',
                'alternative_name' => 'Iphone',
            ],
            [
                'alternative_code' => 'A3',
                'alternative_name' => 'Vivo',
            ],
            [
                'alternative_code' => 'A4',
                'alternative_name' => 'Xiaomi',
            ]
        ];

        foreach($alternatives as $alternative){
            Alternative::create($alternative);
        }
    }
}
