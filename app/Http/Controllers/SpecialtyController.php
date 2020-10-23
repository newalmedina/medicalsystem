<?php

namespace App\Http\Controllers;

use App\Specialty;
use Illuminate\Http\Request;

class SpecialtyController extends Controller
{
    public function index(){
        return view("backoffice.specialty.specialty_mayor");
    }

    public function getSpecialties(){
        return Specialty::all();
    }
    public function store(Request $request){
        return Specialty::create([
            "description"=>$request->specialty_name
        ]);
    }
    public function show($id){
        return Specialty::find($id);
    }
    public function update(Request $request, $id){
        return Specialty::find($id)->update([
            "description"=>$request->specialty_name
        ]);
    }
    public function delete($id){
        return Specialty::find($id)->destroy();
    }
}
