<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class typereaction extends Model
{
    protected $table = 'typereaction';

    /**
     * @var array $fillable
     */
    protected $fillable = [
        'nom_react',
    ];

    public static function getReactions()
    {
        return $list = DB::select("select * from typereaction");
    }
    use HasFactory;
}
