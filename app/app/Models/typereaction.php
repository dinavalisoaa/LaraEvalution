<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class typereaction extends Model
{
    protected $table = 'typereaction';

    /**
     * @var array $fillable
     */
    protected $fillable = [
        'nom_react',
    ];
    use HasFactory;
}
