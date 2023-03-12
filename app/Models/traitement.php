<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class traitement extends Model
{
    use HasFactory;
    public static function c_login($mail,$pwd)
    {
        $id =0;
        $result =DB::select("select id_mb from membres where mail=? and mot_de_pass=?",[$mail, $pwd]);
        foreach ($result as $key) 
        {
            $id = $key->id_mb;
            break;
        }
        return $id;
    }

    public static function Inscription($nom,$email,$dtn,$password)
    {
        try {
            //code...
            $client = DB::insert("insert into membres (nom,mail,dtn,mot_de_pass) values(?,?,?,?)",[$nom,$email,$dtn,$password]);
            return "inscription successive";
        } catch (\Throwable $th) {
            //throw $th;
            return "insription error";
        }
       
    }

    public static function get_suggestion_amis($id_connect)
    {
        $membres = DB::select('SELECT id_mb,nom FROM membres WHERE id_mb != ? and id_mb not in 
        (SELECT id_mb1  FROM amive WHERE id_mb2 = ? UNION 
        SELECT id_mb2  FROM amive WHERE id_mb1 = ?)',[$id_connect,$id_connect,$id_connect]);
        return $membres;
    }

    public static function insert_demand_envoyer($id_connect,$id_rejoin)
    {
        $result = DB::select('SELECT * FROM amis WHERE id_mb1 = ?  and id_mb2 = ?',[$id_connect,$id_rejoin]);
        if ($result != null) 
        {
            return "invalid";   
        }
        else 
        {
            DB::insert("INSERT INTO amis (id_mb1,id_mb2,dhdmd,dhaccp)  VALUES (?,?,'now()',null)",[$id_connect,$id_rejoin]);            
        }
    }

    public static function get_demand_envoyer($id_connect)
    {
        return $requet = DB::select( 'SELECT * FROM amive WHERE id_mb1 = ? and id_mb != ? and dhaccp is null',[$id_connect,$id_connect]);
    }

    public static function annul_demand($id_connect,$id_annul)
    {
        try {
            //code...
            DB::insert('DELETE FROM amis where id_mb1 = ? and id_mb2 = ?',[$id_connect,$id_annul]);
            return "votre demande est annulé";
        } catch (\Throwable $th) {
            //throw $th;
            return "votre requete ne pa valider";
        }
    }

    public static function insert_delete_demand($id_connect,$id_delete)
    {
        DB::insert("DELETE FROM amis WHERE (id_mb2 = $id_connect or id_mb1 = $id_connect) and (id_mb1 = $id_delete or id_mb2 = $id_delete)");
    }

    public static function insert_accept_demand($id_connect,$id_accept)
    {
        DB::insert("UPDATE amis SET dhaccp = 'now()' WHERE id_mb1 = $id_accept and id_mb2 = $id_connect");
    }
    
    public static function get_demand_recu($id_connect)
    {
        return $result = DB::select("SELECT * FROM amive WHERE id_mb2 = $id_connect and id_mb1 = id_mb and id_mb not in 
        (SELECT id_mb1  FROM amive WHERE $id_connect = id_mb1 or $id_connect = id_mb2 and dhaccp is not null UNION 
        SELECT id_mb2  FROM amive WHERE  $id_connect = id_mb2 or $id_connect = id_mb1 and dhaccp is not null)");
    }

    public static function get_amis($id_connect)
    {
        return $result = DB::select("SELECT * FROM amive WHERE id_mb != $id_connect and id_mb2 = $id_connect and dhaccp is not null 
        UNION SELECT * FROM amive WHERE id_mb != $id_connect and id_mb1 = $id_connect and dhaccp is not null");
    }

    public static function get_name($id)
    {
        return $name = DB::select("SELECT nom FROM membres WHERE id_mb = $id");
    }

    public static function send_message($id_sender,$id_receiver,$message)
    {
        DB::insert("INSERT INTO messages (id_p1,id_p2,mess,dhmess) VALUES ($id_sender,$id_receiver,?,'NOW()')",[$message]);
    }

    public static function get_messages($id_sender,$id_receiver)
    {
        return $results = DB::select("SELECT * FROM messages where (id_p1 = $id_sender or id_p1 = $id_receiver) and (id_p2 = $id_receiver or id_p2 = $id_sender)");
    }

    public static function insert_publication($id_creator,$publication,$audience)
    {
        DB::insert("INSERT INTO publication (dhpub, articlepub, typeaffiche, id_mbr) VALUES ('NOW()',?,?,?)",[$publication,$audience,$id_creator]);
    }

    public static function get_publications($id_connect)
    {
        return $results = DB::select(
       "SELECT * FROM pubmembre WHERE typeaffiche = 'public' UNION   
        (SELECT * FROM pubmembre WHERE typeaffiche = 'moi' and id_mbr = $id_connect) UNION   
        SELECT * FROM pubmembre WHERE typeaffiche = 'amis'and (id_mbr = $id_connect or ($id_connect in(  
        SELECT id_mb FROM amive WHERE id_mb2 = id_mbr and dhaccp is not null UNION   
        SELECT id_mb FROM amive WHERE id_mb1 = id_mbr and dhaccp is not null ))) order by dhpub desc");
    }

    public static function get_reactions()
    {
        return $results = DB::select("SELECT * FROM typereaction");
    }
    
    public static function add_reaction_publication($id_publication,$id_connect,$id_reaction)
    {
        DB::insert("INSERT INTO reactions (id_pbl,id_m,id_typereaction) VALUES (?,?,?)",[$id_publication,$id_connect,$id_reaction]);

    }

    public static function get_reactions_pub($id_connect)
    {    
            $results = DB::select("SELECT id_react,nom_reaction FROM breactions  where id_pbl IN(
            SELECT id_pub FROM pubmembre WHERE typeaffiche = 'public' UNION   
            SELECT id_pub FROM pubmembre WHERE typeaffiche = 'moi' and id_mbr = 3 UNION   
            SELECT id_pub FROM pubmembre WHERE typeaffiche = 'amis'and (id_mbr = 3 or (3 in(  
            SELECT id_mb FROM amive WHERE id_mb2 = id_mbr and dhaccp is not null UNION   
            SELECT id_mb FROM amive WHERE id_mb1 = id_mbr and dhaccp is not null ))))");
        return $results;
    }
}

