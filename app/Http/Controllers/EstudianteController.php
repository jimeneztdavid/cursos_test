<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Estudiante::with('carrera')->get();
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
            'nombre'     => 'required|string|max:100',
            'apellido'   => 'required|string|max:100',
            'email'      => 'required|email|max:255',
            'carrera_id' => 'required|integer',
            'estatus'    => 'boolean'
        ]);

        return Estudiante::create($attributes);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $estudiante = Estudiante::with('carrera')->find($id);

        if (!$estudiante) {
           abort(404);
        }

        return $estudiante;
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
        $estudiante = Estudiante::with('carrera')->find($id);

        if (!$estudiante) {
            abort(404);
        }

        $attributes = $request->validate([
            'nombre'     => 'nullable|string|max:100',
            'apellido'   => 'nullable|string|max:100',
            'email'      => 'nullable|email|max:255',
            'carrera_id' => 'nullable|integer',
            'estatus'    => 'boolean'
        ]);

        $estudiante->fill($attributes)->save();

        return $estudiante;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $estudiante = Estudiante::find($id);

        if (!$estudiante) {
            abort(404);
        }

        $estudiante->delete();

        return response()->json(['success' => true]);
    }
}
