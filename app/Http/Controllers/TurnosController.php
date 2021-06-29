<?php

namespace App\Http\Controllers;

use App\Turno;
use Illuminate\Http\Request;

class TurnosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $turnos= Turno::orderBy('id','asc')
        ->get();
        return view('admin.turnos.index',['turnos'=>$turnos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.turnos.create');
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
            'fecha'=>'required',
            'hora'=>'required',
        ]);
        $turno=new Turno();

        $turno->nombre=request('nombre');
        $turno->fecha=request('fecha');
        $turno->hora=request('hora');

        $turno->save();
        return redirect('/turnos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Turno  $turno
     * @return \Illuminate\Http\Response
     */
    public function show(Turno $turno)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Turno  $turno
     * @return \Illuminate\Http\Response
     */
    public function edit(Turno $turno)
    {
        $turnos=Turno::find($turno->id);

        //retornar la vista
        return view('admin.turnos.edit',['turno'=>$turnos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Turno  $turno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Turno $turno)
    {
        $data=request()->validate([
            'nombre'=> 'required|max:255',
            'fecha'=>'required',
            'hora'=>'required',
        ]);
        $turno=Turno::findOrFail($turno->id);

        $turno->nombre=request('nombre');
        $turno->fecha=request('fecha');
        $turno->hora=request('hora');

        $turno->save();
        return redirect('/turnos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Turno  $turno
     * @return \Illuminate\Http\Response
     */
    public function destroy(Turno $turno,Request $request)
    {
        $data=Turno::find($request->turno_id);
        $data->delete();
        return redirect('/turnos');
    }
}
