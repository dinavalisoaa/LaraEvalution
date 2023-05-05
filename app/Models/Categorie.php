<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{ protected $table = 'categorie';

    /**
     * @var array $fillable
     */
    public $timestamps=false;

    use HasFactory;
}
