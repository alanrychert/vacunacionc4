<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AdministratorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = DB::table('users')
        ->join('sanitary_regions', 'sanitary_regions.sanitary_region_id', '=', 'users.sanitary_region_id')
        ->join('provinces', 'provinces.province_id', '=', 'sanitary_regions.province_id')
        ->join ('model_has_roles', 'model_has_roles.model_id','=','users.id')
        ->where('model_has_roles.role_id','=','2')
        ->select('users.name as name','users.dni','users.last_name','provinces.name as province','sanitary_regions.name as region')
        ->get();

        return view('administrators')->with('admins',$admins);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Respons
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
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

    public function getRegions(Request $request)
    {
        $province_id = $request->province_id;
        $regions = DB::table('sanitary_regions')->where('province_id','=',$province_id)->get();
        return $regions;
    }

}


