<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\traitement;
use App\Models\Util;

use App\Models\client_Models;

use Illuminate\Support\Facades\DB;
use \Carbon\Carbon;
use App\Models\Users;
// Route::get('/test', function () {
//     return view('myhome',
//         [
//             'id'=>'1'
//         ]);
// });

class UsersController extends Controller
{
    public function toSignUp()
    {
        return view('users.signup');
    }
    public function action_inscription(Request $req)
    {
        $user = new Users();
        $user->nom = request('nom');
        $user->email = request('email');
        $crypt = Util::crypt(request('mdp'));
        echo $crypt;
        $user->mdp = $crypt;
        $user->save();
        $farany = Users::orderBy('id', 'desc')->limit(1)->get();
        $req->session()->put('session', $farany[0]->id);


        // return view('users.login');
        return redirect('users/home');
    }

    public function action_login(Request $req)
    {
        $email = request('email');
        $mdp = request('mdp');
        $id = Users::login($email, $mdp);
        if ($id == -1) {
            return view(
                'users.login',
                [
                    'error' => 'error'
                ]
            );
        }
        $req->session()->put('session', $id);

        return redirect('users/home');
    }
    public function test(Request $request)
    {
        if (!$request->session()->exists('session')) {
            return redirect('/');
        }
        $value = $request->session()->get('session');
        // echo $value;
        $all = Users::find($value);
        // $order=Users::where('id','1')->get();
        $now = Carbon::now();
        // $where=Users::orderBy('id','desc')->get();
        // $last=Users::findOrFail(1);
        return view('users.test', compact(['value', 'all', 'now']));
        // $this->load->l//
        // return view('test',
        // [
        //     'all'=>$all,'order'=>$byOrder,'where'=>$where
        //     ,'last'=>$last,'id'=>1
        // ]);
    }
}
