<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Util extends Model
{
 
    use HasFactory;
   public static function crypt(string $str){

    $tab=DB::select("select md5('".$str."') as test");
    // echo $tab;
        return $tab[0]->test;
   }

   public static function slugify($text)
   {
       // Strip html tags
       $text=strip_tags($text);
       // Replace non letter or digits by -
       $text = preg_replace('~[^\pL\d]+~u', '-', $text);
       // Transliterate
       setlocale(LC_ALL, 'en_US.utf8');
       $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
       // Remove unwanted characters
       $text = preg_replace('~[^-\w]+~', '', $text);
       // Trim
       $text = trim($text, '-');
       // Remove duplicate -
       $text = preg_replace('~-+~', '-', $text);
       // Lowercase
       $text = strtolower($text);
       // Check if it is empty
       if (empty($text)) { return 'n-a'; }
       // Return result
       return $text;
   }
   public static function slugify_($urlString)
       {
         $search = ['Ș', 'Ț', 'ş', 'ţ', 'Ş', 'Ţ', 'ș', 'ț', 'î', 'â', 'ă', 'Î', ' ', 'Ă', 'ë', 'Ë'];
         $replace = ['s', 't', 's', 't', 's', 't', 's', 't', 'i', 'a', 'a', 'i', 'a', 'a', 'e', 'E'];
         $str = str_ireplace($search, $replace, strtolower(trim($urlString)));
         $str = preg_replace('/[^\w\d\-\ ]/', '', $str);
         $str = str_replace(' ', '-', $str);
         return preg_replace('/\-{2,}', '-', $str);
       }
   
    public static function login($email,$mdp){
        $tab=Users::fromQuery("select *From users where Email='".$email."' and mdp='".$mdp."' limit 1");
        $id=0;
        if(count($tab)==0){
            return -1;
        }
        return $tab[0]['id'];

    }
}
