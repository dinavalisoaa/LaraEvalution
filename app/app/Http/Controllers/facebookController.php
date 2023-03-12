<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\traitement;
use App\Models\client_Models;
use App\Models\typereaction;

class facebookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    #here we talk about the treatment of log in 
    public function login(Request $req)
    {
        $client = $req->all();
        ///$cli=$client;
       $id=client_Models::Login($client['email'],$client['password']);
        return response()->json($id,200);
    }

    public function inscrit(Request $req){
        $membre = $req->all();
        $mess=client_Models::inscription($membre['nom'],$membre['email'],$membre['dtn'],$membre['password']);
        return response()->json($mess,200);
    }

    public function getall(){
        return response()->json(typereaction::all(),200);

    }

    # from here we talk about the request of friends
    public function envoi_demand(Request $req)
    {
        $id_rejoin = $req -> get('id_rejoin');
        $id_connect = $req ->session() -> get('idUser');
        $message = traitement::insert_demand_envoyer($id_connect,$id_rejoin);
        $list_members = traitement::get_suggestion_amis($id_connect);
        $list_demamd_envoyer = traitement::get_demand_envoyer($id_connect);
        $list_demand_recu = traitement::get_demand_recu($id_connect);
        $list_amis = traitement::get_amis($id_connect);
        $list_publications = traitement::get_publications($id_connect);
        $list_reactions = traitement::get_reactions();

        if ($message != null) 
        {
            return view('home',
            [
                'id'=>$id_connect,
                'list_members' => $list_members,
                'list_demand_envoyer' => $list_demamd_envoyer,
                'list_demand_recu' => $list_demand_recu,
                'list_reactions' => $list_reactions,
                'list_amis' => $list_amis,
                'list_publications' => $list_publications
            ]);
        }
        else 
        {
            return view('home',
            [ 
                'id'=>$id_connect,
                'id_membre2'=>$id_rejoin,
                'list_members' => $list_members,
                'list_demand_envoyer' => $list_demamd_envoyer,
                'list_demand_recu' => $list_demand_recu,
                'list_amis' => $list_amis,
            'list_reactions' => $list_reactions,
            'list_publications' => $list_publications
            ]);
        }
    }
    public function annul_demand(Request $req)
    {
        $id_annul = $req -> get('id_annuler');
        $id_connect = $req ->session() -> get('idUser');
        traitement::insert_annul_demand($id_connect,$id_annul);
        $list_members = traitement::get_suggestion_amis($id_connect);
        $list_demamd_envoyer = traitement::get_demand_envoyer($id_connect);
        $list_demand_recu = traitement::get_demand_recu($id_connect);
        $list_publications = traitement::get_publications($id_connect);
        $list_reactions = traitement::get_reactions();
        $list_amis = traitement::get_amis($id_connect);
    
        return view('home',
        [ 
            'id'=>$id_connect,
            'list_members' => $list_members,
            'list_demand_envoyer' => $list_demamd_envoyer,
            'list_demand_recu' => $list_demand_recu,
            'list_amis' => $list_amis,
            'list_reactions' => $list_reactions,
            'list_publications' => $list_publications
        ]);
    }
    public function accept_demand(Request $req)
    {
        $id_accept = $req -> get('id_accept');
        $id_connect = $req ->session() -> get('idUser');
        traitement::insert_accept_demand($id_connect,$id_accept);
        $list_members = traitement::get_suggestion_amis($id_connect);
        $list_demamd_envoyer = traitement::get_demand_envoyer($id_connect);
        $list_demand_recu = traitement::get_demand_recu($id_connect);
        $list_publications = traitement::get_publications($id_connect);
        $list_amis = traitement::get_amis($id_connect);
        $list_reactions = traitement::get_reactions();
        return view('home',
        [ 
            'id'=>$id_connect,
            'list_members' => $list_members,
            'list_demand_envoyer' => $list_demamd_envoyer,
            'list_demand_recu' => $list_demand_recu,
            'list_amis' => $list_amis,
            'list_reactions' => $list_reactions,
            'list_publications' => $list_publications
        ]);
    }

    public function delete_demand(Request $req)
    {
        $id_delete = $req -> get('id_delete');
        $id_connect = $req ->session() -> get('idUser');
        traitement::insert_delete_demand($id_connect,$id_delete);
        $list_members = traitement::get_suggestion_amis($id_connect);
        $list_demamd_envoyer = traitement::get_demand_envoyer($id_connect);
        $list_demand_recu = traitement::get_demand_recu($id_connect);
        $list_amis = traitement::get_amis($id_connect);
        $list_publications = traitement::get_publications($id_connect);
        $list_reactions = traitement::get_reactions();
        return view('home',
        [ 
            'id'=>$id_connect,
            'list_members' => $list_members,
            'list_demand_envoyer' => $list_demamd_envoyer,
            'list_demand_recu' => $list_demand_recu,
            'list_amis' => $list_amis,
            'list_publications' => $list_publications,
            'list_reactions' => $list_reactions
        ]);
    }
    #from here we talk about the message 
    public function messagerie(Request $req)
    {
        $id_connect = $req -> session() -> get('idUser');
        $id_receiver = $req ->input('id_receiver'); 
        $nom = traitement::get_name($id_receiver);
        $list_messages = traitement::get_messages($id_connect,$id_receiver);
        return view('message',
        [
            'id_receiver' => $id_receiver, 
            'id' => $id_connect,
            'nom' => $nom,
            'list_messages' => $list_messages 
        ]);
    }
    
    public function send_message(Request $req)
    {
        $id_sender = $req ->session() ->get('idUser');
        $id_receiver = $req ->input ('id_receiver');
        $message = $req -> input('message');
        $nom = traitement::get_name($id_receiver);
        traitement::send_message($id_sender,$id_receiver,$message);
        $list_messages = traitement::get_messages($id_sender,$id_receiver);
        return view('message',
        [
            'id_receiver' => $id_receiver, 
            'id' => $id_sender,
            'nom' => $nom,
            'list_messages' => $list_messages 
        ]);
    }
    #here we talk about the treatment of publication and reaction 
    public function set_publication(Request $req)
    {
        $id_connect = $req ->session() ->get('idUser');
        $publication = $req -> input('description');
        $audience = $req -> input('audience');
        traitement::insert_publication($id_connect,$publication,$audience);
        $list_members = traitement::get_suggestion_amis($id_connect);
        $list_demamd_envoyer = traitement::get_demand_envoyer($id_connect);
        $list_demand_recu = traitement::get_demand_recu($id_connect);
        $list_amis = traitement::get_amis($id_connect);
        $list_publications = traitement::get_publications($id_connect);
        $list_reactions = traitement::get_reactions();
        return view('home',
        [
            'id' => $id_connect,
            'list_members' => $list_members,
            'list_demand_envoyer' => $list_demamd_envoyer,
            'list_demand_recu' => $list_demand_recu,
            'list_amis' => $list_amis,
            'list_publications' => $list_publications,
            'list_reactions' => $list_reactions
        ]);
    }

    public function add_reaction(Request $req)
    {
        $id_connect  = $req -> session() -> get('idUser');
        $id_reaction = $req -> input('typereact');
        $id_publication = $req -> input('idPublication');
        traitement::add_reaction_publication($id_publication,$id_connect,$id_reaction);
        $list_members = traitement::get_suggestion_amis($id_connect);
        $list_demamd_envoyer = traitement::get_demand_envoyer($id_connect);
        $list_demand_recu = traitement::get_demand_recu($id_connect);
        $list_amis = traitement::get_amis($id_connect);
        $list_publications = traitement::get_publications($id_connect);
        $list_reactions = traitement::get_reactions();
        $listtest = traitement::get_reactions_pub($list_publications);
        

        return view('home',
        [
            'id' => $id_connect,
            'list_members' => $list_members,
            'list_demand_envoyer' => $list_demamd_envoyer,
            'list_demand_recu' => $list_demand_recu,
            'list_amis' => $list_amis,
            'list_publications' => $list_publications,
            'list_reactions' => $list_reactions
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       #
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       #
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       #
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       #
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       #
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       #
    }
}
