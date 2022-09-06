<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\CountryResource;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $country=Country::all();
        return response()->json([
            
            //'nombre' => Country::orderBy('id','asc')->paginate()
            'nombre' => $country
        ]);
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
        $country=Country::create($request->all());
        return response()->json([
         'status' => true,
         //si gustas puedes colocar un mensaje , poder este :
         'message' => 'PAIS CREADO!!!!',
         'nombre '=>$country
     ],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        //mostrar pais por id
    /*     $id= $country->id;
        return response()->json([
            'nombre' => $country,
        ],200); */

        return new CountryResource($country);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Country $country)
    {
        //actualizar los paises 
        $country->update($request->all());
        return response()->json([
            'message' => 'Lista de paises actualizados',
            'nombre' => $country
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        //Eliminar paises :c
        $country->delete();
        return response()->json([
            'message' => 'Pais eliminado satisfactoriamente'
        ],200);
    }
}
