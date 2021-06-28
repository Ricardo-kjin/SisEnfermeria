<?php

namespace App\Http\Controllers;

use App\Instrumento;
use Illuminate\Http\Request;

class InstrumentosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instrumentos= Instrumento::orderBy('id','asc')
        ->get();

        return view('admin.botiquin.instrumentos.index',['instrumentos'=>$instrumentos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.botiquin.instrumentos.create');
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
        $data=request()->validate([
            'nombre'=> 'required|max:255',
            'descripcion'=>'required',
        ]);
        $instrumento=new Instrumento();

        $instrumento->nombre=request('nombre');
        $instrumento->descripcion=request('descripcion');

        $instrumento->save();
        return redirect('/instrumentos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Instrumento  $instrumento
     * @return \Illuminate\Http\Response
     */
    public function show(Instrumento $instrumento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Instrumento  $instrumento
     * @return \Illuminate\Http\Response
     */
    public function edit(Instrumento $instrumento)
    {
        $instrumentos=Instrumento::find($instrumento->id);

        //retornar la vista
        return view('admin.botiquin.instrumentos.edit',['instrumento'=>$instrumentos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Instrumento  $instrumento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Instrumento $instrumento)
    {
        //
        $data=request()->validate([
            'nombre'=> 'required|max:255',
            'descripcion'=>'required',
        ]);
        $instrumento=Instrumento::findOrFail($instrumento->id);

        $instrumento->nombre=request('nombre');
        $instrumento->descripcion=request('descripcion');

        $instrumento->save();
        return redirect('/instrumentos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Instrumento  $instrumento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Instrumento $instrumento, Request $request)
    {

        $data=Instrumento::find($request->instrumento_id);
        $data->delete();
        return redirect('/instrumentos');
    }
}
