<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Recette;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        $les_infologin = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if (Auth::attempt($les_infologin)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'nom' => 'required|min:3|string',
            'prenom' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        $user = new User();
        $user->nom = $data['nom'];
        $user->prenom = $data['prenom'];
        $user->email = $data['email'];
        $user->password = $data['password']; 
        $user->role = 'visiteur';
        $user->save();
        return redirect('/login');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
   
}
