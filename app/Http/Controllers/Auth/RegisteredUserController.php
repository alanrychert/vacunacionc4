<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Province;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use \App\Models\SanitaryRegion;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $provinces = Province::all();

        return view('auth.register')
            ->with('provinces', $provinces);
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'dni' => 'required|int',
            'user' => 'required|string',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed','string','min:8', Rules\Password::defaults()],
            'province' => 'required',
            'sanitary_region' => ['required'],
        ]);
        echo($request->province);
        echo($request->region);
        $user = new User();
        
        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->dni = $request->dni;
        $user->user = $request->user;
        $user->email = $request->email;
        $user->sanitary_region_id =  $request->sanitary_region;
        $user->password = Hash::make($request->password);
        $user->save();
      
        $loggedUser= Auth()->user();
        if ($loggedUser->hasrole('Minister'))
            $user->assignRole("Administrator");
        else
            $user->assignRole("Operator");

        event(new Registered($user));

        return redirect(RouteServiceProvider::HOME);
    }
}
