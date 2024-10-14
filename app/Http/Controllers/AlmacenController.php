<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlmacenRequest;
use App\Models\Almacen;

use Illuminate\Support\Facades\Redirect;

class AlmacenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $almacenes = Almacen::where('estado',1)->get();
        return view('almacenes.index',compact('almacenes'));
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
    public function store(AlmacenRequest $request)
    {
        $almacenes = new Almacen();
        $almacenes->nombre = $request->get('nombre');
        $almacenes->ubicacion = $request->get('ubicacion');
        $almacenes->save();

        notify()->success('Almacen Creado Correctamente', 'LISTO');
        return Redirect::route('almacenes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Almacen $almacen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $almacen = Almacen::find($id);

        return view('almacenes.edit', compact('almacen'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AlmacenRequest $request,$id)
    {
        $almacen = Almacen::find($id);
        $almacen->nombre = $request->get('nombre');
        $almacen->ubicacion = $request->get('ubicacion');
        
        $almacen->update();
        
        //@dd($almacen);
        notify()->success('Almacen Editado Correctamente', 'LISTO');
        return Redirect::route('almacenes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $almacen= Almacen::find($id);
        $almacen->estado= 0;
        $almacen->save();
        notify()->success('Almacen Eliminado Correctamente', 'LISTO');
    
        return Redirect::route('almacenes.index');
    }
}
