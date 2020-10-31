<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(Request $request){
        return view("backoffice.personal.personal");
    }
    public function getAdmins(Request $request){
        if ($request->ajax()) {
           return  $personals = User::where("is_admin",1)->get();
        }
    }
    public function getSecretaries(Request $request){
        if ($request->ajax()) {
            return  $personals = User::where("is_secretary",1)->get();
        }
    }
    public function getDoctors(Request $request){
        if ($request->ajax()) {
            return  $personals = User::where("is_doctor",1)->get();
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

        return User::create([
            "description"=>$request->specialty_name
        ]);
    }

    public function show($id){
        return User::find($id);
    }
    public function update(Request $request, $id){
        $rules = [
            'specialty_name' => 'required'
        ];
        $customMessages = [
            'specialty_name.required' => __('base.Descripción requerida'),
        ];

        $validatedData = $request->validate($rules, $customMessages);
        return User::find($id)->update([
            "description"=>$request->specialty_name
        ]);
    }
    public function destroy($id){
        return User::find($id)->delete();
    }

    public function logout(){

        Auth::logout();
        return redirect('/login');
    }
}
