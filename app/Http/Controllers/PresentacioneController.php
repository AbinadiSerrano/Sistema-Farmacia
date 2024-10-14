<?php

namespace App\Http\Controllers;

use App\Http\Requests\PresentacioneRequest;
use App\Models\Presentacione;
use App\Http\Requests\StorePresentacioneRequest;
use App\Http\Requests\UpdatePresentacioneRequest;
use App\Models\Categoria;
use Illuminate\Support\Facades\Redirect;

class PresentacioneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $presentaciones = Presentacione::where('estado',1)->get();
        $categorias = Categoria::where('estado',1)->get();

        return view('presentaciones.index',compact('presentaciones','categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PresentacioneRequest $request)
    {
        

        $presentaciones = new Presentacione();
        $presentaciones->nombre = $request->get('nombre');
        $presentaciones->categoria_id = $request->get('categoria_id');
        $presentaciones->save();
       // dump($presentaciones);
        
        notify()->success('Presentacion Creada Correctamente', 'LISTO');
        return Redirect::route('presentaciones.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Presentacione $presentacione)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $presentacion = Presentacione::find($id);
        $categorias = Categoria::where('estado', 1)->get();
        //dump($categorias);
        return view('presentaciones.edit', compact('presentacion','categorias'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PresentacioneRequest $request,$id)
    { 
        $presentacion = Presentacione::find($id);
        $presentacion->nombre = $request->get('nombre');
        $presentacion->categoria_id = $request->get('categoria_id');
        $presentacion->update();
        
        notify()->success('Presentacion Editada Correctamente', 'LISTO');
        return Redirect::route('presentaciones.index');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $presentacion= Presentacione::find($id);
            $presentacion->estado= 0;
            $presentacion->save();
            notify()->success('Presentacion Eliminada Correctamente', 'LISTO');
        
            return Redirect::route('presentaciones.index');
    }
}
