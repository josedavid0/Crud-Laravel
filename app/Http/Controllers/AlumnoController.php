<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Grado;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alumnos = Alumno::all();
        return view('alumnos.index', ['alumnos' => $alumnos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('alumnos.create', ['grados' => Grado::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'matricula' => 'required|unique:alumnos|max:10',
            'nombre' => 'required|max:255',
            'fecha' => 'required|date',
            'telefono' => 'required',
            'email' => 'nullable|email',
            'grado' => 'required'
        ]);

        $alumno = new Alumno();
        $alumno->matricula = $request->input('matricula');
        $alumno->nombre = $request->input('nombre');
        $alumno->fecha_nacimiento = $request->input('fecha');
        $alumno->telefono = $request->input('telefono');
        $alumno->email = $request->input('email');
        $alumno->grado_id = $request->input('grado');
        $alumno->save();

        return view('alumnos.message', ['msg' => 'Registro Guardado']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Alumno $alumno)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $alumno = Alumno::find($id);
        return view('alumnos.edit', ['alumno' => $alumno, 'grados' => Grado::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'matricula' => 'required|max:10|unique:alumnos,matricula,' . $id,
            'nombre' => 'required|max:255',
            'fecha' => 'required|date',
            'telefono' => 'required',
            'email' => 'nullable|email',
            'grado' => 'required'
        ]);

        $alumno = Alumno::find($id);
        $alumno->matricula = $request->input('matricula');
        $alumno->nombre = $request->input('nombre');
        $alumno->fecha_nacimiento = $request->input('fecha');
        $alumno->telefono = $request->input('telefono');
        $alumno->email = $request->input('email');
        $alumno->grado_id = $request->input('grado');
        $alumno->save();

        return view('alumnos.message', ['msg' => 'Registro Editado']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $alumno = Alumno::find($id);
        $alumno->delete();

        return redirect('alumnos');
    }
}
