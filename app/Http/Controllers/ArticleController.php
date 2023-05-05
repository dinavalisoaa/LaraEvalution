<?php

namespace App\Http\Controllers;

use App\Models\Util;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Categorie;


// Route::get('/test', function () {
//     return view('myhome',
//         [
//             'id'=>'1'
//         ]);
// });

class ArticleController extends Controller
{
    public function test()
    {

        return view('test');
    }
    public function toLogin()
    {
        return view('admin.login');
    }
    public function toSignUp()
    {
        return view('admin.signup');
    }
    //     public function action_inscription(Request $req)
    //     {
    //         $user=new Admin();
    //         $user->nom=request('nom');
    //         $user->email=request('email');
    //         $crypt=Util::crypt(request('mdp'));
    //         $user->mdp=$crypt;
    //         $user->save();
    //    $farany=Users::orderBy('id','desc')->limit(1)->get();
    //       $req->session()->put('a_session',$farany[0]->id);
    //         return redirect('admin/home');
    //     }
    //     public function valider($id)
    //     {
    //         $users=Users::find($id);
    //         $users->update([
    //             'etat'=>1
    //         ]);
    //     return redirect('admin/home');
    //     }
    //     public function action_login(Request $req)
    //     {
    //         $email =request('email');
    //         $mdp = request('mdp');
    //         $id=Admin::login($email,$mdp);
    //         if($id==-1){

    //         return view('admin.login',
    //         [
    //             'error'=>'error'
    //         ]);
    //     }
    //     $req->session()->put('a_session',$id);

    //        return redirect('admin/home');
    //     }
    public function home(Request $request)
    {
        $ar = Article::all();
        $cat = Categorie::all();
        return view(
            'home',
            [
                'articles' => $ar, 'categorie' => $cat
            ]
        );
    }

    public function create(Request $request)
    {
        $ar = Article::all();
        $titre = request('titre');
        $resume = request('resume');
        $categorie = request('categorie');
        $contenu = request('contenu');

        $file = $request->file('image');
        $photo = $file->getClientOriginalName();
        $destinationPath = 'uploads';
        $file->move($destinationPath, $file->getClientOriginalName());

        $article = new Article();
        $article->photo = $destinationPath . "/" . $photo;
        $article->titre = request('titre');
        $article->resume = request('resume');
        $article->categorieid = request('categorie');
        $article->contenu = request('contenu');
        $article->save();
        $cat = Categorie::all();
        return redirect('home');
    }

    public function list(Request $request)
    {
        $ar = Article::all();
        return view('index',  [
            'articles' => $ar
        ]);
    }
    public function detail(string $slug, string $id)
    {
        $ar = Article::find($id);
        return view('detail',  [
            'articles' => $ar
        ]);
    }
}
