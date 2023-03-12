<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    protected $table = 'Produit';

    /**
     * @var array $fillable
     */
    protected $fillable = [
        'id',
        'nom'

    ];use HasFactory;
}
