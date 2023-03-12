<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class client_Models extends Model
{
    protected $table = 'membres';

    /**
     * @var array $fillable
     */
    protected $fillable = [
        'mail',
        'nom',
        'dtn',
        'password'
    ];
    use HasFactory;

    public static function Login($email,$password){
        $client = DB::select("select id_mb from membres where mail= ? and mot_de_pass= ?",[$email,$password]);
        $id = 0;
        foreach ($client as $cl) {
            # code...
            $id = $cl->id_mb;
            break;
        }
        return $id;
    }
    public static function inscrit($email,$nom,$dtn,$password){

    } 
    
    
    public static function Inscription($nom,$email,$dtn,$password) {
        try {
            //code...
            $client = DB::insert("insert into membres (nom,mail,dtn,mot_de_pass) values(?,?,?,?)",[$nom,$email,$dtn,$password]);
            return "inscription successive";
        } catch (Throwable $th) {
            ///throw $th;
            return "verifier votre email";
        }
    }

}
?>
