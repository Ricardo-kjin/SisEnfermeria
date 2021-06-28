<?php

namespace App\Http\Controllers;

use App\Insumo;
use Illuminate\Http\Request;

class InsumosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $insumos= Insumo::orderBy('id','asc')
        ->get();

        return view('admin.botiquin.insumos.index',['insumos'=>$insumos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.botiquin.insumos.create');
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
        $insumo=new Insumo();

        $insumo->nombre=request('nombre');
        $insumo->precio=request('precio');
        $insumo->descripcion=request('descripcion');

        $insumo->save();
        return redirect('/insumos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Insumo  $insumo
     * @return \Illuminate\Http\Response
     */
    public function show(Insumo $insumo)
    {
        $data=request()->validate([
            'nombre'=> 'required|max:255',
            'descripcion'=>'required',
        ]);
        $insumo=new Insumo();

        $insumo->nombre=request('nombre');
        $insumo->precio=request('precio');
        $insumo->descripcion=request('descripcion');

        $insumo->save();
        return redirect('/insumos');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Insumo  $insumo
     * @return \Illuminate\Http\Response
     */
    public function edit(Insumo $insumo)
    {
        $insumos=Insumo::find($insumo->id);

        //retornar la vista
        return view('admin.botiquin.insumos.edit',['insumo'=>$insumos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Insumo  $insumo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Insumo $insumo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Insumo  $insumo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Insumo $insumo)
    {
        //
    }
}
