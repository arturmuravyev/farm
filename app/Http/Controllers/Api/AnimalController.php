<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Animal;
use App\Models\AnimalKind;
use Illuminate\Support\Facades\Validator;

class AnimalController extends Controller
{
    //post
    public function store(Request $request){

        $validator = Validator::make($request->all(), [
           'name' => 'required|unique:animals',
           'kind' => 'required'
        ]);

        $animal_response['error'] = 'cannot create';
        $animal_response['data'] = 'not ok';

        if(!$validator->fails()){
            $animal = Animal::create($request->all());
            $animal_response['error'] = null;
            $animal_response['data'] = 'ok';
            return response()->json($animal_response, 201);
        }
        
        return response()->json($animal_response);
    }

    //get
    public function getByName($name){
        return Animal::select('name', 'kind', 'age', 'size')->where('name', $name)->get();
    }

    //post
    public function age(Request $request){

        $validator = Validator::make($request->all(), [
           'name' => 'required'
        ]);

        $animal_response['error'] = 'cannot age';
        $animal_response['data'] = 'not ok';

        if(!$validator->fails()){
            $animal = Animal::select('id', 'age', 'kind', 'size')->where('name', $request->name)->get()->first();
            $growth_factor = AnimalKind::select('growth_factor')->where('kind', $animal->kind)->value('growth_factor');

            $animal->age += 1;//round($growth_factor);
            $animal->size += 12*round($growth_factor);
            $animal->save();

            $animal_response['error'] = null;
            $animal_response['data'] = 'ok';
        }

        return response()->json($animal_response);
    }
}

