<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CafeManha;
use DB;

class CafeManhaController extends Controller
{

    public function index()
    {
        $cafes = CafeManha::all();
        return $cafes;
    }

    public function store(Request $request)
    {
        $cafe = new CafeManha();
        $cafe->principal = $request->principal;    
        $cafe->paes = $request->paes;
        $cafe->frutas = $request->frutas;
        $cafe->sucos = $request->sucos;
        $cafe->data = $request->data;


        $cafe->save();
    }

    public function show($id)
    {
        $cafe = CafeManha::find($id);
        return $cafe;
    }


    public function update(Request $request, $id)
    {
        $cafe = CafeManha::findOrFail($request->id);
        $cafe->principal = $request->principal;    
        $cafe->paes = $request->paes;
        $cafe->frutas = $request->frutas;
        $cafe->sucos = $request->sucos;
        $cafe->data = $request->data;

        $cafe->save();
        return $cafe;
    }

    public function destroy($id)
    {
        $cafe = CafeManha::destroy($id);
        return $cafe;
    }

    public function getCafeManhaFromDate($date) {
        $cafe = DB::table('cafe_manhas')->where('data', $date);
        return $cafe->get();
    }
}
