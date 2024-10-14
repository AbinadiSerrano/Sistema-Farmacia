<?php

namespace App\Http\Controllers;

use App\Http\Requests\LaboratorioRequest;
use App\Models\Laboratorio;
use Illuminate\Support\Facades\Redirect;

class LaboratorioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $laboratorios = Laboratorio::where('estado',1)->get();
        return view('laboratorios.index',compact('laboratorios'));
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
    public function store(LaboratorioRequest $request)
    {
        $laboratorios = new Laboratorio();
        $laboratorios->nombre = $request->get('nombre');
        $laboratorios->direccion = $request->get('direccion');
        $laboratorios->correo = $request->get('correo');
        $laboratorios->telefono = $request->get('telefono');
        $laboratorios->pais = $request->get('pais');
        $laboratorios->ciudad = $request->get('ciudad');
        $laboratorios->save();

        notify()->success('Laboratorio Creado Correctamente', 'LISTO');
        return Redirect::route('laboratorios.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Laboratorio $laboratorio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $laboratorio = Laboratorio::find($id);

        return view('laboratorios.edit', compact('laboratorio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LaboratorioRequest $request,$id)
    {
        $laboratorio = Laboratorio::find($id);
        $laboratorio->nombre = $request->get('nombre');
        $laboratorio->direccion = $request->get('direccion');
        $laboratorio->correo = $request->get('correo');
        $laboratorio->telefono = $request->get('telefono');
        $laboratorio->pais = $request->get('pais');
        $laboratorio->ciudad = $request->get('ciudad');
       
        $laboratorio->update();
        notify()->success('Laboratorio Editado Correctamente', 'LISTO');
        return Redirect::route('laboratorios.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $laboratorio= Laboratorio::find($id);
        $laboratorio->estado= 0;
        $laboratorio->save();
        notify()->success('Laboratorio Eliminado Correctamente', 'LISTO');
    
        return Redirect::route('laboratorios.index');
    }
}
