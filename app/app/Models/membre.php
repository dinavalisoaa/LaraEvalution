<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class membre extends Model
{
    protected $table = 'membres';

    /**
     * @var array $fillable
     */
    protected $fillable = [
        'email',
        'password'
    ];
    use HasFactory;
}