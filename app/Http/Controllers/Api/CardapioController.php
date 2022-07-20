<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Almoco;
use App\Models\CafeManha;
use App\Models\Janta;
use App\Models\Cardapio;
use DB;

class CardapioController extends Controller
{
    
    public function index()
    {
        $cardapio = Cardapio::all();
        return $cardapio;
    }

    public function store(Request $request)
    {

        $cafe = CafeManha::create($request->cardapio['cafe']);
        $almoco = Almoco::create($request->cardapio['almoco']);
        $janta = Janta::create($request->cardapio['janta']);

        //$cafe->save();
        //$almoco->save();
        //$janta->save();

        $cardapio = new Cardapio();
        $cardapio->id_cafe = $cafe->id;
        $cardapio->id_almoco = $almoco->id;
        $cardapio->id_janta = $janta->id;
        $cardapio->data = $janta->data;

        $cardapio->save();
        print_r($cardapio->id);
        
        /* {
  "cardapio" : {
    "data" : "05-07-2022",
    "cafe" : {
      "cafe_principal" : "Cuscuz",
      "cafe_paes": "Sal e doce",
      "cafe_frutas": "Melancia",
      "cafe_sucos": "Frutas"
    },
    "almoco" : {
      "almoco_proteinas": "Toscana e bisteca",
      "almoco_saladas": "Alface",
      "almoco_complementos": "Arroz e feijão",
      "almoco_suco": "Frutas"
    },
    "janta" : {
      "janta_principal" : "Cuscuz",
      "janta_paes": "Sal e doce",
      "janta_frutas": "Melancia",
      "janta_sucos": "Frutas"
    }
  }
} */

        /*$cafe = new CafeManha();
        $cafe->principal = $request->cafe_principal;    
        $cafe->paes = $request->cafe_paes;
        $cafe->frutas = $request->cafe_frutas;
        $cafe->sucos = $request->cafe_sucos;
        $cafe->data = $request->data;

        $cafe->save();

        $almoco = new Almoco();
        $almoco->proteinas = $request->almoco_proteinas;    
        $almoco->saladas = $request->almoco_saladas;
        $almoco->complementos = $request->almoco_complementos;
        $almoco->sucos = $request->almoco_sucos;
        $almoco->data = $request->data;

        $almoco->save();

        $janta = new Janta();
        $janta->principal = $request->janta_principal;    
        $janta->paes = $request->janta_paes;
        $janta->frutas = $request->janta_frutas;
        $janta->sucos = $request->janta_sucos;
        $janta->data = $request->data;

        $janta->save();*/

    }

    public function show($id)
    {

        $cardapio = Cardapio::find($id);
        $cafe = $cardapio->cafeManha()->first();
        $almoco = $cardapio->almoco()->first();
        $janta = $cardapio->janta()->first();


        return response()->json([
            'cardapio' => ['cafe' => $cafe, 'almoco' => $almoco, 'janta' => $janta, 'data' => $cardapio->data, 'id' => $cardapio->id]
        ]);
    }

    public function update(Request $request, $id)
    {

        $cardapio = Cardapio::findOrFail($id);

        $cafe = CafeManha::findOrFail($cardapio->id_cafe);
        $cafe->principal = $request->cardapio['cafe']['principal'];
        $cafe->paes = $request->cardapio['cafe']['paes'];
        $cafe->frutas = $request->cardapio['cafe']['frutas'];
        $cafe->sucos = $request->cardapio['cafe']['sucos'];

        $cafe->save();

        $almoco = Almoco::findOrFail($cardapio->id_almoco);
        $almoco->proteinas =  $request->cardapio['almoco']['proteinas'];
        $almoco->saladas =  $request->cardapio['almoco']['saladas'];
        $almoco->complementos =  $request->cardapio['almoco']['complementos'];
        $almoco->sucos =  $request->cardapio['almoco']['sucos'];

        $almoco->save();

        $janta = Janta::findOrFail($cardapio->id_janta);
        $janta->principal = $request->cardapio['janta']['principal'];
        $janta->paes = $request->cardapio['janta']['paes'];
        $janta->frutas = $request->cardapio['janta']['frutas'];
        $janta->sucos = $request->cardapio['janta']['sucos'];

        $janta->save();

        //$cafe = CafeManha::create($request->cardapio['cafe']);
        //$almoco = Almoco::create($request->cardapio['almoco']);
        //$janta = Janta::create($request->cardapio['janta']);

        print_r($request->cardapio['almoco']['proteinas']);
        print_r($id);

        /*$jantaQuery = DB::table('jantas')->where('data', $date)->first();
        $cafeQuery = DB::table('cafe_manhas')->where('data', $date)->first();
        $almocoQuery = DB::table('almocos')->where('data', $date)->first();

        $cafe = CafeManha::findOrFail($jantaQuery->id_cafe);
        $cafe->principal = $request->cafe_principal;    
        $cafe->paes = $request->cafe_paes;
        $cafe->frutas = $request->cafe_frutas;
        $cafe->sucos = $request->cafe_sucos;
        $cafe->data = $request->data;

        $cafe->save();

        $almoco = Almoco::findOrFail($request->id_almoco);
        $almoco->proteinas = $request->almoco_proteinas;    
        $almoco->saladas = $request->almoco_saladas;
        $almoco->complementos = $request->almoco_complementos;
        $almoco->sucos = $request->almoco_sucos;
        $almoco->data = $request->data;

        $almoco->save();

        $janta = Janta::findOrFail($request->id_janta);
        $janta->principal = $request->janta_principal;    
        $janta->paes = $request->janta_paes;
        $janta->frutas = $request->janta_frutas;
        $janta->sucos = $request->janta_sucos;
        $janta->data = $request->data;

        $janta->save();*/
        
    }

    public function destroy($id)
    {

        $cardapio = Cardapio::find($id);
        $cafe = $cardapio->cafeManha();
        $almoco = $cardapio->almoco();
        $janta = $cardapio->janta();

        $cardapio->delete();
        $cafe->delete();
        $almoco->delete();
        $janta->delete();

        //$cardapio = Cardapio::destroy($id);
        return $cardapio;
    }
    public function getCardapioFromDate($date) {

        /*$janta = DB::table('jantas')->where('data', $date)->first();
        $cafe = DB::table('cafe_manhas')->where('data', $date)->first();
        $almoco = DB::table('almocos')->where('data', $date)->first();
        
        $cardapio = new Cardapio();
        $cardapio->cafe_principal = $cafe->principal;
        $cardapio->cafe_paes = $cafe->paes;
        $cardapio->cafe_frutas = $cafe->frutas;
        $cardapio->cafe_sucos = $cafe->sucos;
        $cardapio->id_cafe = $cafe->id;
        $cardapio->almoco_proteinas = $almoco->proteinas;
        $cardapio->almoco_saladas = $almoco->saladas;
        $cardapio->almoco_complementos = $almoco->complementos;
        $cardapio->almoco_sucos = $almoco->sucos;
        $cardapio->id_almoco = $almoco->id;
        $cardapio->janta_principal = $janta->principal;
        $cardapio->janta_paes = $janta->paes;
        $cardapio->janta_frutas = $janta->frutas;
        $cardapio->janta_sucos = $janta->sucos;
        $cardapio->id_janta = $janta->id;
        $cardapio->data = $janta->data;

        return $cardapio;*/

    }
}
