<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usuario;
use DB;

class UsuarioController extends Controller
{
    public function checkUser(Request $request) {

        //print_r($request['principal']);

        $usuario = $request->usuario;
        $usuarioBd = DB::table('usuarios')->where('email', $usuario['email'])->where('senha', $usuario['senha'])->first();
        
        $response;

        if($usuarioBd != null){
          //echo $usuarioBd->email;
          $response = response()->json([
            'permissao' => true
         ]);
        }else{
          //echo "error";
          $response = response()->json([
            'permissao' => false
         ]);
        }

        //echo $response;
        return $response;
        

        //return response()->json([
          //  'cardapio' => ['cafe' => $cafe, 'almoco' => $almoco, 'janta' => $janta, 'data' => $cardapio->data, 'id' => $cardapio->id]
        //]);
    }

}
