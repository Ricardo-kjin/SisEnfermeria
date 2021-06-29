<?php

namespace App\Http\Controllers;

use App\Enfermera;
use App\User;
use Illuminate\Http\Request;

class EnfermeraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$enfermeras=User::where('tipo_persona','3')->get();
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Enfermera  $enfermera
     * @return \Illuminate\Http\Response
     */
    public function show(Enfermera $enfermera)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Enfermera  $enfermera
     * @return \Illuminate\Http\Response
     */
    public function edit(Enfermera $enfermera)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Enfermera  $enfermera
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Enfermera $enfermera)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Enfermera  $enfermera
     * @return \Illuminate\Http\Response
     */
    public function destroy(Enfermera $enfermera)
    {
        //
    }
}
