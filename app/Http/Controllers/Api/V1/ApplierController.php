<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Applier;
use Illuminate\Http\Request;

use App\Http\Resources\V1\ApplierResource;
use App\Http\Resources\V1\ApplierCollection;

class ApplierController extends Controller
{
    public function index()
    {
        return new ApplierCollection(Applier::orderBy('id','asc')->paginate());
    }


    public function store(Request $request)
    {
        $applier = Applier::create($request->all());
        return response()->json([

         'mensaje' => 'Postulante creado satifactoriamente..!',
         'usuario' => $applier,
     ],200);
    }


    public function show(Applier $applier)
    {
        return new ApplierResource($applier);
    }


    public function update(Request $request, Applier $applier)
    {
        $applier->update($request->all());
        return response()->json([
            'message' => 'Usuario actualizado!!!',
            'usuario'=>$applier,
         ],200);
    }


    public function destroy(Applier $applier)
    {
        $applier->delete();
        return response()->json([
        'message' => 'Usuario eliminado',
        ],200);
    }
}
