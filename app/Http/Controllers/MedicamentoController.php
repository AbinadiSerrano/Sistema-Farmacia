<?php

namespace App\Http\Controllers;

use App\Http\Requests\MedicamentoRequest;
use App\Models\Laboratorio;
use App\Models\Medicamento;
use App\Models\Presentacione;
use Illuminate\Support\Facades\Redirect;

class MedicamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $medicamentos = Medicamento::where('estado',1)->get();
        $laboratorios = Laboratorio::where('estado',1)->get();
        $presentaciones = Presentacione::where('estado',1)->get();
        //si quiero mostrar el nombre de categoria
        $medicamentos = Medicamento::with('presentaciones.categorias')->where('estado',1)->get();

        return view('medicamentos.index',compact('medicamentos','laboratorios','presentaciones'));
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
    public function store(MedicamentoRequest $request)
    {
        $medicamentos = new Medicamento();
        $medicamentos->nombre = $request->get('nombre');
        $medicamentos->precio = $request->get('precio');
        $medicamentos->fecha_vencimiento = $request->get('fecha_vencimiento');
        $medicamentos->indicaciones = $request->get('indicaciones');
        $medicamentos->laboratorio_id = $request->get('laboratorio_id');
        $medicamentos->presentacion_id = $request->get('presentacion_id');
        $medicamentos->save();
       // dump($presentaciones);
        
        notify()->success('Medicamento Creado Correctamente', 'LISTO');
        return Redirect::route('medicamentos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Medicamento $medicamento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $medicamento = Medicamento::find($id);
        $laboratorios = Laboratorio::where('estado', 1)->get();
        $presentaciones = Presentacione::where('estado', 1)->get();
        //dump($categorias);
        return view('medicamentos.edit', compact('medicamento','laboratorios','presentaciones'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MedicamentoRequest $request, $id)
    {
        $medicamento = Medicamento::find($id);
        $medicamento->nombre = $request->get('nombre');
        $medicamento->precio = $request->get('precio');
        $medicamento->fecha_vencimiento = $request->get('fecha_vencimiento');
        $medicamento->indicaciones = $request->get('indicaciones');
        $medicamento->laboratorio_id = $request->get('laboratorio_id');
        $medicamento->presentacion_id = $request->get('presentacion_id');
        $medicamento->update();
        
        notify()->success('Medicamento Editado Correctamente', 'LISTO');
        return Redirect::route('medicamentos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $medicamento= Medicamento::find($id);
        $medicamento->estado= 0;
        $medicamento->save();

        notify()->success('Medicamento Eliminado Correctamente', 'LISTO');
        return Redirect::route('medicamentos.index');
    }
}
