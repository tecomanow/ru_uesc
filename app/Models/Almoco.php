<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cardapio;

class Almoco extends Model
{
    use HasFactory;
    protected $fillable = ['proteinas', 'saladas', 'complementos', 'sucos', 'data'];

    public function cardapio() {
        $this->belongsTo(Cardapio::class);
    }
}
