<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Vaccinated;
use App\Models\TypeOfVaccine;

class VaccinatedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Respons
     */
    public function create()
    {
        $types_of_vaccines = TypeOfVaccine::query()->get();

        return view('new-vaccinated-form')
            ->with('types', $types_of_vaccines);;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'date_of_birth' => 'required',
            'dni' => 'required|int',
            'sex' => 'required|char',
            'date_of_vaccination' => 'required',
            'type_of_vaccine' => 'required',
            'vaccine_number' => 'required'
        ]);

        $vaccinated = Vaccinated::create([
            'name' => $request->name,
            'last_name' => $request->last_name,
            'date_of_birth' => $request->date_of_birth,
            'dni' => $request->dni,
            'comorbidity' => $request->comorbidity,
            'sex' => $request->sex,
            'date_of_vaccination' => $request->date_of_vaccination,
        ]);

        $vaccinated->vaccines()->create([
            'type_of_vaccine' => $request->type_of_vaccine,
            'vaccine_number' => $request->vaccine_number,
        ]);

        $vaccinated->save();
        
        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('edit-vaccinated-form',[
            'vaccined' => Vaccinated::findOrFail($user)
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'dni' => 'required|int',
            'user' => 'required|string',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
        ]);

        $vaccinated = Vaccinated::findOrFail($user);

        $vaccinated->update($request->all());
        return redirect()->route('index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        
        return redirect()->route('index')->with('info', 'Se eliminó al usuario con éxito');
    }

}
