<?php

namespace App\Http\Controllers;

use App\Mayor;
use Illuminate\Http\Request;

class MayorController extends Controller
{
    public function index(){
        return "area y especializacion";
    }

    public function getSpecialties(){
        return Mayor::all();
    }
    public function store(Request $request){
        return Mayor::create([
            "description"=>$request->mayor_name
        ]);
    }
    public function show($id){
        return Mayor::find($id);
    }
    public function update(Request $request, $id){
        return Mayor::find($id)->update([
            "description"=>$request->mayor_name
        ]);
    }
    public function delete($id){
        return Mayor::find($id)->destroy();
    }
}
