<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProovedoreRequest;
use App\Models\Proovedore;

use Illuminate\Support\Facades\Redirect;

class ProovedoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proveedores = Proovedore::where('estado',1)->get();
        return view('proveedores.index',compact('proveedores'));
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
    public function store(ProovedoreRequest $request)
    {
        $proveedores = new Proovedore();
        $proveedores->nombre = $request->get('nombre');
        $proveedores->pais = $request->get('pais');
        $proveedores->ciudad = $request->get('ciudad');
        $proveedores->direccion = $request->get('direccion');
        $proveedores->correo = $request->get('correo');
        $proveedores->telefono = $request->get('telefono');
        $proveedores->save();

        notify()->success('Proveedor Creado Correctamente', 'LISTO');
        return Redirect::route('proveedores.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Proovedore $proovedore)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $proveedor = Proovedore::find($id);

        return view('proveedores.edit', compact('proveedor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProovedoreRequest $request,$id)
    {
        $proveedor = Proovedore::find($id);
        $proveedor->nombre = $request->get('nombre');
        $proveedor->pais = $request->get('pais');
        $proveedor->ciudad = $request->get('ciudad');
        $proveedor->direccion = $request->get('direccion');
        $proveedor->correo = $request->get('correo');
        $proveedor->telefono = $request->get('telefono');
       
        $proveedor->update();
        notify()->success('Proveedor Editado Correctamente', 'LISTO');
        return Redirect::route('proveedores.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $proveedor= Proovedore::find($id);
        $proveedor->estado= 0;
        $proveedor->save();
        notify()->success('Proveedor Eliminado Correctamente', 'LISTO');
    
        return Redirect::route('proveedores.index');
    }
}
