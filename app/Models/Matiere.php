<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matiere extends Model
{
    protected $table = 'matiere';

    use HasFactory;
    public function Mouvements()
    {
        return $this->hasMany(MouvementMatiere::class);
    }
}
