<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Author;
use App\Models\Theme;
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
    public function toLogin(Request $request)
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
        echo $request->session()->get('sessionid');
        if ($request->session()->get('sessionid') != null) {
            $ar = Article::all();
            $cat = Categorie::all();
            $theme = Theme::all();
            $Author = Author::find($request->session()->get('sessionid'));
            return view(
                'home',
                [
                    'articles' => $ar,
                    'categorie' => $cat,
                    'theme' => $theme,
                    'author' => $Author
                ]
            );
        }
        return redirect('login');
    }
    public function header(Request $request)
    {
        return view('header');
    }
    public function action_login(Request $request)
    {
        $login = Author::login(request('login'), request('mdp'));
        if ($login == -1) {
            return redirect('login');
        }
        $request->session()->put('sessionid', $login);
        return redirect('home');
    }
    public function create(Request $request)
    {
        $ar = Article::all();
        $titre = request('titre');
        $resume = request('resume');
        $categorie = request('categorie');
        $contenu = request('contenu');
        $theme = request('theme');
        // $request->session()->put('sessionid',$login);

        $session = $request->session()->get('sessionid');

        $file = $request->file('image');
        $photo = $file->getClientOriginalName();
        $destinationPath = './public/uploads';
        $file->move($destinationPath, $file->getClientOriginalName());

        $article = new Article();
        $article->photo = $destinationPath . "/" . $photo;
        $article->titre = request('titre');
        $article->resume = request('resume');
        $article->categorieid = request('categorie');
        $article->contenu = request('contenu');
        $article->themeid = request('theme');
        $article->authorid = $session;
        $article->save();
        $cat = Categorie::all();
        return redirect('home');
    }
    public function login(Request $request)
    {
        $request->session()->forget('sessionid');
        // $request->session()->flush();
        return view('login');
    }
    public function list(Request $request)
    {
        $ar = Article::paginate(3);
        $theme=Theme::all();
        return view('index', [
            'articles' => $ar,'theme'=>$theme
        ]);

        // return redirect('login');

    }
    public function detail(string $slug, string $id)
    {
        $ar = Article::find($id);
        $theme=$ar->themeid;
        $themes=Article::fromQuery("select *from article where themeid=".$theme." limit 3");
        return view('detail', [
            'articles' => $ar,'autre'=>$themes
        ]);
    }
}