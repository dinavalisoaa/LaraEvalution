<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{ 
    protected $table = 'article';

    /**
     * @var array $fillable
     */
    public $timestamps=false;

    public function getTheme(){
        return Theme::find($this->themeid);
    }
    
    public function getCategorie(){
        return Categorie::find($this->categorieid);
    }
    use HasFactory;
    public static function login($email,$mdp){
        $tab=Admin::fromQuery("select *From Admin where Email='".$email."' and mdp=md5('".$mdp."') limit 1");
        $id=0;
        if(count($tab)==0){
            return -1;
        }
        return $tab[0]['id'];

    }
}
