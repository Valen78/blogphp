<?php

namespace App\Http\Controllers;

use Auth;
use App\Http\Requests;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function login(Request $request)
    {
        if($request->isMethod('post')) {
            $this->validate($request, [
                'email' => 'required|email',
                'password' => 'required',
                'remember' => 'in:remember'
            ]);

            $remember = !empty($request->input('remember'))?true:false;

            $credentials = $request->only('email','password');

            if(Auth::attempt($credentials, $remember) && Auth::user()->role == 'administrator')
                return redirect('post');
            else
                return back()->withInput($request->only('email','remember'))
                    ->with('message', 'Erreur d\'authentification !');
        }
        else
        {
            return view('auth.login');
        }
    }

    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }
}
