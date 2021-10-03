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
        
        return view('dashboard')
            ->with('user',$user);
    }
}
