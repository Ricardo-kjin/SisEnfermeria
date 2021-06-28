<?php

namespace App\Http\Controllers;

use App\Medicamento;
use App\Presentacion;
use App\Tipo;
use Illuminate\Http\Request;

class MedicamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicamentos= Medicamento::orderBy('id','asc')
                                ->get();
        //dd($medicamentos);
        return view('admin.botiquin.medicamentos.index',['medicamentos'=>$medicamentos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.botiquin.medicamentos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);

        $request->validate([
            'medicamento_name' => 'required|max:255',
            'composicion' => 'required|max:255',
            'dosis' => 'required|max:255',
            'codigo' => 'required|max:255',
            'precio' => 'required|numeric',
        ]);

        $medicamento = new Medicamento();

        $medicamento->nombre = $request->medicamento_name;
        $medicamento->composicion = $request->composicion;
        $medicamento->dosis = $request->dosis;
        $medicamento->codigo = $request->codigo;
        $medicamento->precio = $request->precio;

        $medicamento-> save();

        $listOfTipos = explode(',', preg_replace('/( ){2,}/u',' ', $request->tipo_medicamento));//create array from separated/coma permissions

        foreach ($listOfTipos as $tipo) {
            $tipos = new Tipo();
            $tipos->nombre = trim($tipo);
           //$tipos->slug = strtolower(str_replace(" ", "-", $tipo));
           // $tipos->estado= 1;
            $tipos->save();
            $medicamento->tipos()->attach($tipos->id);
            $medicamento->save();
        }
        //dd($tipos);
        $listOfPresentacion = explode(',',preg_replace('/( ){2,}/u',' ', $request->presentacion_medicamento));//create array from separated/coma permissions

        foreach ($listOfPresentacion as $presentacion) {
            $presentacions = new Presentacion();
            $presentacions->nombre = trim($presentacion);
            //$presentacions->slug = strtolower(str_replace(" ", "-", $presentacion));
            //$presentacions->estado= 1;
            $presentacions->save();
            $medicamento->presentacions()->attach($presentacions->id);
            $medicamento->save();
        }

        return redirect('/medicamentos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Medicamento $medicamento)
    {
        //
        return view('admin.botiquin.medicamentos.show',['medicamento'=>$medicamento]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Medicamento $medicamento)
    {
        //
        return view('admin.botiquin.medicamentos.edit',['medicamento'=>$medicamento]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Medicamento $medicamento)
    {
        //
        //dd($request);
        $request->validate([
            'medicamento_nombre' => 'required|max:255',
            'composicion' => 'required|max:255',
            'dosis' => 'required|max:255',
            'codigo' => 'required|max:255',
            'precio' => 'required|numeric',
        ]);
        $listOfTipos = explode(',',preg_replace('/( ){2,}/u',' ',$request->medicamentos_tipos));


        //$var=$medicamento->tipos()->where('nombre',trim($listOfTipos[2]))->get();
        //dd($var,$listOfTipos[2]);
        $medicamento->nombre = $request->medicamento_nombre;
        $medicamento->composicion = $request->composicion;
        $medicamento->dosis = $request->dosis;
        $medicamento->codigo = $request->codigo;
        $medicamento->precio = $request->precio;

        $medicamento->tipos()->detach();
        $medicamento->presentacions()->detach();
        $medicamento->tipos()->delete();
        $medicamento->presentacions()->delete();
//
        $medicamento->save();

        //create array from separated/coma permissions
        //dd($listOfTipos);
        foreach ($listOfTipos as $tipo) {
            $tipos = new Tipo();
            $tipos->nombre = trim($tipo);
            //$tipos->slug = strtolower(str_replace(" ", "-", $tipo));
            //$tipos->estado= 1;
            $tipos->save();
            $medicamento->tipos()->attach($tipos->id);
            $medicamento->save();
        }

        $listOfPresentacion = explode(',', preg_replace('/( ){2,}/u',' ', $request->medicamentos_presentacions));//create array from separated/coma Presentacion
        foreach ($listOfPresentacion as $presentacion) {
            $presentacions = new Presentacion();
            $presentacions->nombre = trim($presentacion);
            //$presentacions->slug = strtolower(str_replace(" ", "-", $presentacion));
            //$presentacions->estado= 1;
            $presentacions->save();
            $medicamento->presentacions()->attach($presentacions->id);
            $medicamento->save();
        }

        return redirect('/medicamentos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Medicamento $medicamento)
    {
        $medicamento->tipos()->detach();
        $medicamento->presentacions()->detach();
        $medicamento->delete();
        $medicamento->tipos()->delete();
        $medicamento->presentacions()->delete();




        return redirect('/medicamentos');
    }
}
