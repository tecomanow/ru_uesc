<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CafeManha extends Model
{
    use HasFactory;
    protected $fillable = ['principal', 'paes', 'frutas', 'sucos', 'data'];

    public function cardapio() {
        $this->belongsTo(Cardapio::class);
    }
}
