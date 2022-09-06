<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\ProvinceResource;
use App\Models\Province;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //mostrar la lista deprovincias
        $provinces = Province::all();
        return response()->json([
            'nombre' => $provinces
        ],200);

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
        //crear nuevas provincias
        $province=Province::create($request->all());
        return response()->json([
            'mensaje'=>'Datos almacenados',
            'nombre' => $province
        ],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Province  $province
     * @return \Illuminate\Http\Response
     */
    public function show(Province $province)
    {
        //mostrar provincias  por id 
       /*  $id=$province->id;
        return response()->json([
            'nombre' => $id,
        ],200); */
         return new ProvinceResource($province);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Province  $province
     * @return \Illuminate\Http\Response
     */
    public function edit(Province $province)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Province  $province
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Province $province)
    {
        //actualizar provincias
        $province->update($request->all());
        return response()->json([
            'mensaje' =>'Datos actualizados ',
            'nombre' =>$province
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Province  $province
     * @return \Illuminate\Http\Response
     */
    public function destroy(Province $province)
    {
        //eliminar provinci
        $province->delete();
        return response()->json([
            'mensaje' => 'Datos eliminados ',
        ],200);
    }
}
