<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AnimalKind;
use App\Http\Resources\AnimalKindResource;

class AnimalKindController extends Controller
{
    //
    public function getAnimalKinds(){
    	return AnimalKindResource::collection(AnimalKind::all());
    }
}
