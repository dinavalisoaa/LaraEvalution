<?php
namespace App\Http\Controllers;

use App\Models\Util;

use Illuminate\Http\Request;
use App\Models\traitement;
use App\Models\Users;

use App\Models\client_Models;
use App\Models\Admin;
 
// Route::get('/test', function () {
//     return view('myhome',
//         [ 
//             'id'=>'1'
//         ]);
// });

class AdminController extends Controller
{
    public function toLogin()
    {
return view('admin.login');       
    
    }
    public function toSignUp()
    {
return view('admin.signup');       
    
    }
    public function action_inscription(Request $req)
    {
        $user=new Admin();
        $user->nom=request('nom');
        $user->email=request('email');
        $crypt=Util::crypt(request('mdp'));
        $user->mdp=$crypt;
        $user->save();
   $farany=Users::orderBy('id','desc')->limit(1)->get();
      $req->session()->put('a_session',$farany[0]->id);
        return redirect('admin/home');
    }
    public function valider($id)
    {
        $users=Users::find($id);
        $users->update([
            'etat'=>1
        ]);
    return redirect('admin/home');
    }
    public function action_login(Request $req)
    {
        $email =request('email');
        $mdp = request('mdp');
        //$req -> get('mdp');
        // $user=new Admin();
        // $user->nom='test';
        // $user->email='mail';
        // $user->mdp='mdp';

        // $user->save();
        // Admin::create([
        //     'email'=>'io','mdp'=>'io'
        // ]);
        $id=Admin::login($email,$mdp);
        if($id==-1){
         
        return view('admin.login',
        [ 
            'error'=>'error'
        ]);   
    }
    $req->session()->put('a_session',$id);

       return redirect('admin/home');
    }
    public function home(Request $request)
    {
        if (!$request->session()->exists('a_session')) {
        return redirect('admin/login');
        }
        $all=Users::all();
        $order=Admin::where('id','1')->get();
        $where=Admin::orderBy('id','desc')->get();
        // $last=Admin::findOrFail(1);
            // $id=1;
            // return view('message'); 
                   return view('admin.home',compact(['all','order','where']));
        // $this->load->l//
        // return view('test',
        // [ 
        //     'all'=>$all,'order'=>$byOrder,'where'=>$where
        //     ,'last'=>$last,'id'=>1
        // ]);
    }
}
