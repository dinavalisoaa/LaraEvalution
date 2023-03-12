<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use App\Models\MouvementMatiere;
use App\Models\Matiere;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class MouvementMatiereController extends Controller
{
    public function saisie_matiere(Request $req)
    {
        $users=new MouvementMatiere();
        $users->matiereid=request('matiereid');
        $users->entrer=request('entrer');
        $users->sortis=0;//request('sortis'0;//);
        $users->daty=request('daty');
        $users->save();
         return redirect('matieres');
    }
    public function liste_matiere(Request $req)
    {
        $tab=Matiere::all();
        $liste=MouvementMatiere::fromQuery('select matiereid,sum(entrer)as entrer,sum(sortis) as sortis from mouvementmatiere group by matiereid');
        return view('matiere.liste',[
            'liste'=>$liste,
            'matieres'=>$tab
        ]);
    }
    //
}
