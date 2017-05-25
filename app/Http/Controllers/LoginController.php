<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Http\Requests;
use Auth;

class LoginController extends Controller
{
    private $usuario;

    public function __construct(User $user)
    {
        $this->usuario = $user;
    }

    public function index()
    {
    	return view('login.login');
    }

    public function login(Request $request)
    {
    	if(Auth::attempt(['email' => $request->email, 'password' => $request->password]))
        {
            return redirect()->intended('/app/dashboard');
        } else {
            return redirect('/');
        }
    }

    public function create_user()
    {
    	return view('login.register');
    }

    public function register(Request $request)
    {
        $path = public_path().'/avatar';
        $filename = 'avatar';
        $fileExtension = $request->file('avatar')->getClientOriginalExtension();
        $file = $filename.'.'.$fileExtension;
        $request->file('avatar')->move($path,$file);

    	$newuser = $this->usuario;
        $newuser->name = $request->input('name');
        $newuser->email = $request->input('email');
        $newuser->password = bcrypt($request->input('password'));
        $newuser->avatar = url('/avatar/'.$file);
        $newuser->save();
        return redirect('/')->with(['msg' => 'Usuario criado com sucesso!', 'status' => 'ok']);
    }

    public function logout()
    {
    	Auth::logout();
    	return redirect('/');
    }

    public function editUserProfile($id)
    {
        $user = User::find($id);
        return view('user.edit', ['user' => $user]);
    }

    public function updateUser(Request $request, $id)
    {
        $user = $this->usuario->find($id);
        $path = public_path().'/avatar';
        $filename = 'avatar';
        $fileExtension = $request->file('avatar')->getClientOriginalExtension();
        $file = $filename.'.'.$fileExtension;
        $request->file('avatar')->move($path,$file);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->avatar = url('/avatar/'.$file);
        if($request->input('password') != '')
        {
            if($request->input('password') == $request->input('confirm_password'))
            {
                $user->password = bcrypt($request->input('password'));
            }

            $user->save();
            return redirect('/')->with(['msg' => 'Usuario atualizado com sucesso!', 'status' => 'ok']);
        } else {
            $user->save();
            return redirect('/app/dashboard')->with(['msg' => 'Usuario atualizado com sucesso!', 'status' => 'ok']);
        }


    }
}
