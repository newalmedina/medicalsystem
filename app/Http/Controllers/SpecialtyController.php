<?php

namespace App\Http\Controllers;

use App\Specialty;
use Illuminate\Http\Request;

class SpecialtyController extends Controller
{
    public function index(){
        return view("backoffice.specialty.specialty");
    }

      public function getSpecialties(Request $request){
        if ($request->ajax()) {
           return  $specialties = Specialty::all();
        }
    }
    public function store(Request $request){
        $rules = [
            'specialty_name' => 'required|unique:specialties,description'
        ];
        $customMessages = [
            'specialty_name.required' => __('base.Descripción requerida'),
            'specialty_name.unique' => __('base.Este registro ya existe, si no lo visualizas en el listado puedes restauralo desde la papelera'),
        ];

        $validatedData = $request->validate($rules, $customMessages);

        return Specialty::create([
            "description"=>$request->specialty_name
        ]);
    }
    public function show($id){
        return Specialty::find($id);
    }
    public function update(Request $request, $id){
        $rules = [
            'specialty_name' => 'required'
        ];
        $customMessages = [
            'specialty_name.required' => __('base.Descripción requerida'),
        ];

        $validatedData = $request->validate($rules, $customMessages);
        return Specialty::find($id)->update([
            "description"=>$request->specialty_name
        ]);
    }
    public function destroy($id){
        return Specialty::find($id)->delete();
    }
}
