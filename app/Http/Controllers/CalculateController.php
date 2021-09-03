<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Criteria;
use App\Matrix;

class CalculateController extends Controller
{
    function cmp($prev, $next){
        return strcmp($prev['value'], $next['value']);
    }

    public function index(){
        $criterias = Criteria::orderBy('criteria_code')->get();

        $firstCriteriaValue = [];

        foreach ($criterias as $criteria){
            $firstCriteriaValue[] = [
                'criteria_code' => $criteria->criteria_code,
                'weight' => $criteria->category === "Cost"  ? 
                ($criteria->weight * -1) / $criterias->sum('weight') : ($criteria->weight * 1) / $criterias->sum('weight')
            ];
        }

        $matrices = Matrix::orderBy('id')->get();

        $tempResults = [];

        foreach($matrices as $key => $matrix){

            foreach($firstCriteriaValue as $key => $firstValue){
                if($matrix->criteria_code === $firstValue['criteria_code']){
                    $tempResults[] = [
                        'alternative_code' => $matrix->alternative_code,
                        'value' => pow($matrix->value, $firstValue['weight'])
                    ];
                }
            }
        }

        $vectorS = [];
        foreach ($tempResults as $tempResult){
            $index = $this->criteriaCode($tempResult['alternative_code'], $vectorS);
            if ($index < 0) {
                $vectorS[] = $tempResult;
            }
            else {
                $vectorS[$index]['value'] *=  $tempResult['value'];
            }
        }

        $vectorV = [];

        foreach($vectorS as $s){
            $vectorV [] = [
                'alternative_code' => $s['alternative_code'],
                'value' => $s['value'] / $this->sumVectorS($vectorS)
            ];
        }

        $vectorVClone = $vectorV;

        $ranking = [];
        
        $sotVectorV = usort($vectorVClone, function($a, $b){
            // return strcmp($a['value'], $b['value']);
            return $a['value'] < $b['value'];
        });

        foreach ($vectorVClone as $keyClone => $clone){
            foreach($vectorV as $keyVectorV => $v){
                if($clone['alternative_code'] == $v['alternative_code']){
                    $vectorV[$keyVectorV]['ranking'] = $keyClone + 1;
                }
            }
        }

        $mergeMatrix = [];
        foreach($matrices as $matrix){
            $mergeMatrix[$matrix->alternative_code]['alternative_code'] = $matrix->alternative_code;
            $mergeMatrix[$matrix->alternative_code][$matrix->criteria_code] = $matrix->value;
        }

        return view('pages.calculates.index', compact('firstCriteriaValue', 'mergeMatrix', 'vectorS'));
    }

    public function criteriaCode($alternativeCode, $array) {
        $result = -1;
        for($i=0; $i<sizeof($array); $i++) {
            if ($array[$i]['alternative_code'] == $alternativeCode) {
                $result = $i;
                break;
            }
        }
        return $result;
    }

    public function sumVectorS($array){
        $sum = 0;
        foreach ($array as $item){
            if(isset($item['value'])){
                $sum += $item['value'];
            }
        }
        return $sum;
    }
}
