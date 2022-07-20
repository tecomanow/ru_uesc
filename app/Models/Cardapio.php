<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Almoco;
use App\Models\CafeManha;
use App\Models\Janta;
use App\Models\Cardapio;

class Cardapio extends Model
{
    use HasFactory;
    /*protected $fillable = ['cafe_principal', 'cafe_paes', 'cafe_frutas', 'cafe_sucos','id_cafe', 'almoco_proteinas', 
    'almoco_saladas', 'almoco_complementos', 'almoco_sucos','id_almoco', 'janta_principal', 'janta_paes', 'janta_frutas', 'janta_sucos', 'id_janta', 'data'];*/

    protected $fillable = ['id_cafeManha','id_almoco','id_janta'];

    public function almoco() {
        return $this->hasOne(Almoco::class, 'id', 'id_almoco');
    }

    public function cafeManha(){
        return $this->hasOne(CafeManha::class, 'id', 'id_cafe');
    }

    public function janta(){
        return $this->hasOne(Janta::class, 'id', 'id_janta');
    }
}
