<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{ 
    protected $table = 'author';

    /**
     * @var array $fillable
     */
    public $timestamps=false;
    use HasFactory;
    public static function login($email,$mdp){
        $tab=Admin::fromQuery("select *From author where login='".$email."' and mdp=md5('".$mdp."') limit 1");
        $id=0;
        if(count($tab)==0){
            return -1;
        }
        return $tab[0]['id'];

    }
}
