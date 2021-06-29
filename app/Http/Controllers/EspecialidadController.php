<?php

namespace App\Http\Controllers;

use App\Especialidad;
use Illuminate\Http\Request;

class EspecialidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $especialidads= Especialidad::orderBy('id','asc')
        ->get();

        return view('admin.especialidad.index',['especialidads'=>$especialidads]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.especialidad.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=request()->validate([
            'nombre'=> 'required|max:255',
            'descripcion'=>'required',
        ]);
        $especialidad=new Especialidad();

        $especialidad->nombre=request('nombre');
        $especialidad->descripcion=request('descripcion');

        $especialidad->save();
        return redirect('/especialidads');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Especialidad  $especialidad
     * @return \Illuminate\Http\Response
     */
    public function show(Especialidad $especialidad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Especialidad  $especialidad
     * @return \Illuminate\Http\Response
     */
    public function edit(Especialidad $especialidad)
    {
        return view('admin.especialidad.edit',['especialidad'=>$especialidad]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Especialidad  $especialidad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Especialidad $especialidad)
    {
        $data=request()->validate([
            'nombre'=> 'required|max:255',
            'descripcion'=>'required',
        ]);
        $especialidad=Especialidad::findOrFail($especialidad->id);

        $especialidad->nombre=request('nombre');
        $especialidad->descripcion=request('descripcion');

        $especialidad->save();
        return redirect('/especialidads');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Especialidad  $especialidad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Especialidad $especialidad, Request $request)
    {
        $data=Especialidad::find($request->especialidad_id);
        $data->delete();
        return redirect('/especialidads');
    }
}
