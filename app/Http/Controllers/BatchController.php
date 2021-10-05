<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Batch;
use App\Models\TypeOfVaccine;
use App\Models\Vaccine;

class BatchController extends Controller
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
    
        return view('new-batch-form')
            ->with('types', $types_of_vaccines);
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
            'batch_number' => 'required|int',
            'since' => 'required|int',
            'to' => 'required|int|gt:since',
            'type_of_vaccine' => 'required',
            'dose' => 'required',
            'reception_date' => 'required',
        ]);
        
        $date_of_expiry = date("d-m-Y",strtotime($request->reception_date."+ 4 week")); 

        $loggedUser = Auth()->user();
        $sanitary_region_name = $loggedUser->sanitary_region;

        Batch::create([
            'batch_number' => $request->batch_number,
            'since' => $request->since,
            'to' => $request->to,
            'dose' => $request->dose,
            'reception_date' => $request->reception_date,
            'date_of_expiry' => $date_of_expiry,
            'sanitary_region' => $sanitary_region_name
        ]);



        for($i=$request->to; $i<$request->since; $i++){
            echo($i);
            echo('HOLA');
            Vaccine::create([
                'vaccine_number' => $i,
                'type_of_vaccine' => $request->type_of_vaccine,
                'batch_number' => $request->batch_number,
            ]);
        }

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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {

    }

}
