<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Almoco;
use DB;

class AlmocoController extends Controller
{

    public function index()
    {
        $almocos = Almoco::all();
        return $almocos;
    }

    public function store(Request $request)
    {
        $almoco = new Almoco();
        $almoco->proteinas = $request->proteinas;    
        $almoco->saladas = $request->saladas;
        $almoco->complementos = $request->complementos;
        $almoco->sucos = $request->sucos;
        $almoco->data = $request->data;

        $almoco->save();
    }

    public function show($id)
    {
        $almoco = Almoco::find($id);
        return $almoco;
    }

    public function update(Request $request, $id)
    {
        $almoco = Almoco::findOrFail($request->id);
        $almoco->proteinas = $request->proteinas;    
        $almoco->saladas = $request->saladas;
        $almoco->complementos = $request->complementos;
        $almoco->sucos = $request->sucos;
        $almoco->data = $request->data;

        $almoco->save();
        return $almoco;
    }

    public function destroy($id)
    {
        $almoco = Almoco::destroy($id);
        return $almoco;
    }

    public function getFromSalada($salada) {
        $almocos = DB::table('almocos')->where('saladas', $salada);
        return $almocos->get();
    }

    public function getAlmocoFromDate($date) {
        $almocos = DB::table('almocos')->where('data', $date);
        return $almocos->get();
    }
}
