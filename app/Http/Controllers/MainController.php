<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index(){

        $countries = DB::table('countries')->get();
        return view('welcome', ['countries'=>$countries]);

    }

    public function findStateID(Request $request){
        $state = DB::table('states')
        ->where('countryId', $request->id)->get();

        return response()->json($state);
    }
}
