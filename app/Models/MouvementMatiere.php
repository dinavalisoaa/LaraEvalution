<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MouvementMatiere extends Model
{
    protected $table = 'mouvementmatiere';
    use HasFactory;
    public function matiere()
    {
        return $this->belongsTo(Matiere::class,'matiereid');
    }
}
