<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Absense;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AbsenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $absense = Absense::create($request->all());
        return response()->json([

            'mensaje' => 'inasistencia creada ',
            'usuario' => $absense,
        ],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Absense  $absense
     * @return \Illuminate\Http\Response
     */
    public function show(Absense $absense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Absense  $absense
     * @return \Illuminate\Http\Response
     */
    public function edit(Absense $absense)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Absense  $absense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Absense $absense)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Absense  $absense
     * @return \Illuminate\Http\Response
     */
    public function destroy(Absense $absense)
    {
        $absense->delete();
        return response()->json([
        'message' => 'Inasistencia eliminada',
        ],200);
    }
}
