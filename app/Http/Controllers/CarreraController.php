<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use Illuminate\Http\Request;

class CarreraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Carrera::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'nombre' => 'required|string|max:100',
            'descripcion' => 'required|string',
            'estatus' => 'nullable|boolean'
        ]);

        return Carrera::create($attributes);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $carrera = Carrera::find($id);

        if (!$carrera) {
            abort(404);
        }

        return $carrera;
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
        $carrera = Carrera::find($id);

        if (!$carrera) {
            abort(404);
        }
        
        $attributes = $request->validate([
            'nombre' => 'required|string|max:100',
            'descripcion' => 'required|string',
            'estatus' => 'required|boolean'
        ]);

        $carrera = $carrera->fill($attributes)->save();

        return $carrera;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $carrera = Carrera::find($id);

        if (!$carrera) {
            abort(404);
        }

        $carrera->delete();

        return response()->json(['success' => true]);
    }
}
