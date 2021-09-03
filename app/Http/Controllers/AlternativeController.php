<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alternative;

class AlternativeController extends Controller
{
    public function index() {
        
        return view('pages.alternatives.index');
    }

    public function jsonAllData(){
        $alternatives = Alternative::orderBy('id')->get();
        return response()->json([
            'message' => 'Get all data is successful',
            'status' => 200,
            'data' => $alternatives
        ],200);
    }

    public function jsonDataById($id) {
        $alternatives = Alternative::findOrFail($id);
        return response()->json([
            'message' => 'Get data by id is successful',
            'status' => 200,
            'data' => $alternatives
        ],200);
    }

    public function storeJson(Request $request) {
        $rules = [
            'alternative_name' => 'required'
        ];

        $messages = [
            'required' => ':attribute must be filled'
        ];

        $this->validate($request, $rules, $messages);

        $alternative = Alternative::create([
            'alternative_code' => $request->alternative_code,
            'alternative_name' => $request->alternative_name,
        ]);

        return response()->json([
            'message' => 'Add new data is successfull',
            'status' => 200
        ], 200);
    }

    public function updateJson(Request $request, $id){
        $rules = [
            'alternative_name' => 'required'
        ];

        $messages = [
            'required' => ':attribute must be filled'
        ];

        $this->validate($request, $rules, $messages);

        $alternative = Alternative::findOrFail($id);

        $alternative->update([
            'alternative_code' => $request->alternative_code,
            'alternative_name' => $request->alternative_name,
        ]);

        return response()->json([
            'message' => 'Edit data is successfull',
            'status' => 200
        ], 200);
    }

    public function deleteJson($id){
        $alternative = Alternative::findOrFail($id);

        $alternative->delete();

        return response()->json([
            'message' => 'Edit data is successfull',
            'status' => 200
        ], 200);
    }
}
