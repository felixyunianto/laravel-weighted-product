<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Criteria;

class CriteriaController extends Controller
{
    public function index(){
        $criterias = Criteria::orderBy('criteria_code')->get();
        return view('pages.criterias.index', compact('criterias'));
    }

    public function create(){
        $criterias = Criteria::orderBy('criteria_code')->get();
        $criteriaCode = 'C'.(count($criterias) + 1);
        return view('pages.criterias.create', compact('criteriaCode'));
    }

    public function store(Request $request){
        $rules = [
            'criteria_code' => 'required',
            'criteria' => 'required',
            'weight' => 'required',
            'category' => 'required',
        ];

        $messages = [
            'required' => ':attribute must be filled'
        ];

        $this->validate($request, $rules, $messages);

        Criteria::create([
            'criteria_code' => $request->criteria_code,
            'criteria' => $request->criteria,
            'weight' => $request->weight,
            'category' => $request->category,
        ]);

        return redirect()->route('criteria.index');
    }
}
