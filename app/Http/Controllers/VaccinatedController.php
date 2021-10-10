<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Vaccinated;
use App\Models\TypeOfVaccine;
use App\Models\Vaccine;
use App\Rules\AvailableVaccine;
use Illuminate\Support\Facades\DB;
class VaccinatedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $vaccinateds = Vaccinated::all()->sortBy('dni');
       return view('vaccinateds')->with('vaccinateds',$vaccinateds);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Respons
     */
    public function create()
    {
        return view('load-dni-form');
    }

    public function nextForm(Request $request)
    {
        $types_of_vaccines = TypeOfVaccine::query()->get();

        $vaccinated_dni = $request->dni;
        $vaccinated = DB::table('vaccinated')->where('dni','=',$vaccinated_dni)->get();
        $vaccines_count = 0;
        $view = view('new-vaccinated-form');


        $header='';

        if($vaccinated->count() == 0){
            $header = 'Formulario de Nuevo Vacunado';
        }
        else {
            $vaccinated_id = $vaccinated->first()->vaccinated_id;
            $vaccines_count = Vaccinated::all()->where('vaccinated_id','=',$vaccinated_id)->first()->vaccines->count();
            $header = 'Formulario de Dosis Numero: '.$vaccines_count+1;
            $view = view('vaccine-form');
        }


        return $view
            ->with('types', $types_of_vaccines)
            ->with('dni',$vaccinated_dni)
            ->with('header',$header)
            ->with('dose',$vaccines_count);
    }

    
    public function validateVaccineData(Request $request){
        $available = new AvailableVaccine($request);
        $request->validate([
            'date_of_vaccination' => ['required', $available],
            'type_of_vaccine' => 'required',
            'vaccine_number' => 'required',
        ]);


    }
    public function validateVaccinatedData(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'date_of_birth' => 'required',
            'dni' => 'required|int',
            'sex' => 'required',
        ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    	//No pude hacer la regla custom pero esta creado el archivo AvailableVaccine.php

        //batch_number is unique so there will always be only one batch with that number
        $batch = Batch::get()->where('batch_number','=',$request->batch_number)->first();
        if ($batch == null){
            return redirect()->route('vaccinated.create');
        }
        else{
            $vaccine = Vaccine::get()
            ->where('batch_id','=',$batch->batch_id)
            ->where('vaccine_number','=',$request->vaccine_number)
            ->first();
            }

        //No pude hacer la regla custom pero esta creado el archivo AvailableVaccine.php
        if ($vaccine == null){
            return redirect()->route('vaccinated.create');        
        }


        $this->validateVaccineData($request);

        if($request->dose == 0){
            
            $this->validateVaccinatedData($request);
            $this->createVaccinated($request);
            
        }   
        
        $vaccinated = Vaccinated::get()
        ->where('dni','=',$request->dni)
        ->first();

        //dd($vaccinated);

        $vaccine->date_of_vaccination= $request->date_of_vaccination;
        $vaccine->vaccinated_id = $vaccinated->vaccinated_id;
        $vaccine->update();

        return redirect()->route('vaccinated.create');
    }

    public function createVaccinated(Request $request)
    {

        Vaccinated::create([
            'name' => $request->name,
            'last_name' => $request->last_name,
            'date_of_birth' => $request->date_of_birth,
            'dni' => $request->dni,
            'comorbidity' => $request->comorbidity,
            'sex' => $request->sex,
            'type_of_vaccine' => $request->type_of_vaccine,
            'vaccine_number' => $request->vaccine_number,
        ]);
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
    public function edit(User $user,int $dni)
    {
        $types_of_vaccines = TypeOfVaccine::all();
        return view('edit-vaccinated-form',[
            'vaccinated' => Vaccinated::all()->where('dni','=',$dni)->first(),
            'types' => $types_of_vaccines
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $dni)
    {
        $vaccinated = Vaccinated::where('dni','=',$dni)->get()->first();
        $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'date_of_birth' => 'required',
            'dni' => 'required|integer',
            'sex' => 'required',
            'date_of_vaccination' => 'required',
            'type_of_vaccine' => 'required',
            'vaccine_number' => 'required'
        ]);

        $vaccinated->update([
            'name' => $request->name,
            'last_name' => $request->last_name,
            'date_of_birth' => $request->date_of_birth,
            'dni' => $request->dni,
            'comorbidity' => $request->comorbidity,
            'sex' => $request->sex,
        ]);

        $vaccine = Vaccine::where('vaccinated','=',$vaccinated->dni)->get()->first();
        if($vaccine->type_of_vaccine != $request->type_of_vaccine || $vaccine->vaccine_number!=$request->vaccine_number){
            $vaccine->date_of_vaccination= null;
            $vaccine->vaccinated=null;
            $vaccine->update();
            $vaccine = Vaccine::get()
            ->where('type_of_vaccine','=',$request->type_of_vaccine)
            ->where('vaccine_number','=',$request->vaccine_number)
            ->first();
            $vaccine->date_of_vaccination = $request->date_of_vaccination;
            $vaccine->vaccinated = $vaccinated->vaccinated_id;
            $vaccine->update();
        }

        $vaccinated->update();

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
