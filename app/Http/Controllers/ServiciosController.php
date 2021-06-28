<?php

namespace App\Http\Controllers;

use App\Servicio;
use Illuminate\Http\Request;

class ServiciosController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servicios= Servicio::where('estado','1')
                            -> orderBy('id','asc')
                            ->get();

            return view('admin.servicio.index',['servicios'=>$servicios]); //'servicios' servira en la vista de index
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.servicio.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validar formulario

        $data=request()->validate([
            'nombre'=> 'required|max:255',
            'image'=> 'required|image',
            'precio'=> 'required|numeric',
            'descripcion'=>'required',
        ]);
        //obtener la imagen del formulario
        $fileNameWithTheExtension = request('image')->getClientOriginalName();

        //obtener el nombre de la imagen sin la extension
        $fileName=pathinfo($fileNameWithTheExtension, PATHINFO_FILENAME);

        //obtener la extension de la imagen
        $extension = request('image')->getClientOriginalExtension();

        //nuevo nombre de la imagen para la BD
        $newFileName=$fileName . '_' . time() . '.' . $extension;

        //creamos un fichero publico para guardar la imagen
        $path=request('image')->storeAs('public/images/servicio_image',$newFileName);

        //dd($fileNameWithTheExtension);

        $user= auth()->user();
        $servicio=new Servicio();

        $servicio->nombre=request('nombre');
        $servicio->img_url=$newFileName;
        $servicio->precio=request('precio');
        $servicio->descripcion=request('descripcion');
        $servicio->estado=1;

        $servicio->save();
        return redirect('/servicios');
        //dd($user->email);
        //dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function show(Servicio $servicio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function edit(Servicio $servicio)
    {
        //dd($servicio);
        //obtener el servicio del la tabla
        $servicios=Servicio::find($servicio->id);

        //retornar la vista
        return view('admin.servicio.edit',['servicio'=>$servicios]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Servicio $servicio)
    {
        //dd($servicio);
        //Validar formulario

        $data=request()->validate([
            'nombre'=> 'required|max:255',
            'image'=> 'required|image',
            'precio'=> 'required|numeric',
            'descripcion'=>'required',
        ]);
        //obtener la imagen del formulario
        $fileNameWithTheExtension = request('image')->getClientOriginalName();

        //obtener el nombre de la imagen sin la extension
        $fileName=pathinfo($fileNameWithTheExtension, PATHINFO_FILENAME);

        //obtener la extension de la imagen
        $extension = request('image')->getClientOriginalExtension();

        //nuevo nombre de la imagen para la BD
        $newFileName=$fileName . '_' . time() . '.' . $extension;

        //creamos un fichero publico para guardar la imagen
        $path=request('image')->storeAs('public/images/servicio_image',$newFileName);

        //dd($fileNameWithTheExtension);

        $servicio=Servicio::findOrFail($servicio->id);

        $servicio->nombre=request('nombre');
        $servicio->img_url=$newFileName;
        $servicio->precio=request('precio');
        $servicio->descripcion=request('descripcion');

        $servicio->save();
        return redirect('/servicios');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //º-dd($request->servicio_id);
        //encontrar en servicio
        $data=Servicio::find($request->servicio_id);

        $oldImage=public_path().'/storage/images/servicio_image/'.$data->img_url;

        if (file_exists($oldImage)) {
            # delete the image
            unlink($oldImage);
        }

        //desabilito
        $data->estado=2;

        //guardo
        $data->save();

        //redirecciono
        return redirect('/servicios');
    }
}
