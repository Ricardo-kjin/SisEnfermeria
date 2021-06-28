<?php

namespace App\Http\Controllers;

use App\Servicio;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $servicios= Servicio::where('estado','1')
                            -> orderBy('id','asc')
                            ->simplePaginate(4);

        return view('welcome',['servicios'=>$servicios]);
    }

    public function show($id)
    {
        //encontramos el servicio por el id
        $servicio=Servicio::find($id);
        return view('/show',['servicio'=>$servicio]);
    }
}
