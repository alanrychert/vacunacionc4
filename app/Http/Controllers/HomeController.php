<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{

    public function index()
    {
        return view('welcome');
    }
    public function dashboard()
    {
        $user = auth()->user();
        $rol = $user->roles->pluck('name');
        
        return view('dashboard')
            ->with('user',$user)
            ->with('rol',$rol[0]);
    }
}
