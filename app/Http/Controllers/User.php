<?php

namespace App\Http\Controllers;
use App\mdUser;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use DB;
class User extends Controller
{
    //=============================================
    public function index(){
        if(!Session::get('login')){
            return redirect('login')->with('alert', 'Kamu harus Sign In terlebih dahulu');
        }
        else{
            $users = DB::table('md_users')->get();
            // var_dump($users);
            // exit;
            //dd($users);
            return view('home_user',['home_user'=>$users]);
        }
    }

    //=============================================
    public function login(){
        return view('login');
    }

    //=============================================
    public function loginPost(Request $request){

        $email = $request->email;
        $password = $request->password;
        $data = mdUser::where('email',$email)->first();
        if($data){
            if(Hash::check($password,$data->password)){
                Session::put('name',$data->name);
                Session::put('email',$data->email);
                Session::put('login',TRUE);
                return redirect('home_user');
            }
            else{
                return redirect('login')->with('alert','Password atau Email -atas- Salah!');
            }
        }
        else{
            return redirect('login')->with('alert','Email atau Password -bawah- Salah!');
        }
    }

    //=============================================
    public function logout(){
        Session::flush();
        return redirect('login')->with('alert','Kamu telah Sign Out.');
    }

    //=============================================
    public function register(Request $request){
        return view('register');
    }

    //=============================================
    public function registerPost(Request $request){
        $this->validate($request, [
            'name' => 'required|min:4',
            'email' => 'required|min:4|email|unique:md_users',
            'password' => [
                'required',
                'string',
                'min:6',             // must be at least 6 characters in length
                // 'regex:/[a-z]/',      // must contain at least one lowercase letter
                // 'regex:/[A-Z]/',      // must contain at least one uppercase letter
                // 'regex:/[0-9]/',      // must contain at least one digit
                // 'regex:/[@$!%*#?&]/', // must contain a special character
            ],
            'confirmation' => 'required|same:password',
            'terms' => 'required'
        ]);
        $data = new mdUser();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->save();
        return redirect('login')->with('alert-success','Kamu telah berhasil Register');
    }

    //=============================================
    public function about(){
        if(!Session::get('login')){
            return redirect('login')->with('alert', 'Kamu harus Sign In terlebih dahulu');
        }
        else{
            $users = DB::table('md_users')->get();
            // var_dump($users);
            // exit;
            //dd($users);
            return view('about',['home_user'=>$users]);
        }
    }
}
