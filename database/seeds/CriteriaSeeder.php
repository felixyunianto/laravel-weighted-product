<?php

use Illuminate\Database\Seeder;
use App\Criteria;

class CriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $criterias = [
            [
                'criteria_code' => 'C1',
                'criteria' => 'Price',
                'weight' => 5,
                'category' => 'Cost'
            ],
            [
                'criteria_code' => 'C2',
                'criteria' => 'Quality',
                'weight' => 4,
                'category' => 'Benefit'
            ],
            [
                'criteria_code' => 'C3',
                'criteria' => 'Feature',
                'weight' => 4,
                'category' => 'Benefit'
            ],
            [
                'criteria_code' => 'C4',
                'criteria' => 'Popular',
                'weight' => 3,
                'category' => 'Benefit'
            ],
            [
                'criteria_code' => 'C5',
                'criteria' => 'After-sale',
                'weight' => 2,
                'category' => 'Benefit'
            ],
            [
                'criteria_code' => 'C6',
                'criteria' => 'Durability',
                'weight' => 2,
                'category' => 'Benefit'
            ],
        ];

        foreach($criterias as $criteria){
            Criteria::create($criteria);
        }
    }
}
