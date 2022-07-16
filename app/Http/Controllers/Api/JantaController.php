<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Janta;
use DB;

class JantaController extends Controller
{
    public function index()
    {
        $jantas = Janta::all();
        return $jantas;
    }

    public function store(Request $request)
    {
        $janta = new Janta();
        $janta->principal = $request->principal;    
        $janta->paes = $request->paes;
        $janta->frutas = $request->frutas;
        $janta->sucos = $request->sucos;
        $janta->data = $request->data;


        $janta->save();
        return "OK";
    }

    public function show($id)
    {
        $janta = Janta::find($id);
        return $janta;
    }


    public function update(Request $request, $id)
    {
        $janta = Janta::findOrFail($request->id);
        $janta->principal = $request->principal;    
        $janta->paes = $request->paes;
        $janta->frutas = $request->frutas;
        $janta->sucos = $request->sucos;
        $janta->data = $request->data;


        $janta->save();
        return $janta;
    }

    public function destroy($id)
    {
        $janta = Janta::destroy($id);
        return $janta;
    }

    public function getJantaFromDate($date) {
        $jantas = DB::table('jantas')->where('data', $date);
        return $jantas->get();
    }
}
