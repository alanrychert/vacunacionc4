<?php

namespace App\Http\Controllers;

use App\Models\Vaccine;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class VaccineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vaccines = DB::table('vaccines')
        ->join('vaccines_batches','vaccines.batch_id','=','vaccines_batches.batch_id')
        ->join('sanitary_regions','vaccines_batches.sanitary_region_id','=','sanitary_regions.sanitary_region_id')
        ->join('provinces','sanitary_regions.province_id','=','provinces.province_id')
        ->select('vaccine_number','batch_number','dose','date_of_vaccination','provinces.name')
        ->get()->sortBy('batch_number');
        //->DB::raw("SELECT vaccine_number,batch_number,dose,date_of_vaccination,p.name FROM vaccines NATURAL JOIN vaccines_batches NATURAL JOIN sanitary_regions as sr JOIN provinces as p ON sr.province_id = p.province_id")->get();
        return view('vaccines')->with('vaccines',$vaccines);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getVaccinesByProvince(Request $request)
    {
        $province = $request->province;
        $vaccines = DB::raw("SELECT vaccine_id,vaccine_number,date_of_vaccination FROM vaccines NATURAL JOIN vaccines_batches NATURAL JOIN sanitary_regions as sr JOIN provinces as p ON sr.province_id = p.province_id where p.name='{{$province}}'");
        dd();
        return $vaccines;
    }
}
