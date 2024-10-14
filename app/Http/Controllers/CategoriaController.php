<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoriaRequest;
use App\Models\Categoria;
use Illuminate\Support\Facades\Redirect;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Categoria::where('estado',1)->get();
        return view('categorias.index',compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //logica para mostrar solo la vista del create
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoriaRequest $request)
    {
        
        // Lógica para almacenar un nuevo usuario
        $categorias = new Categoria();
        $categorias->nombre = $request->get('nombre');
        $categorias->save();

        notify()->success('Categoria Creada Correctamente', 'LISTO');
        return Redirect::route('categorias.index');
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $categoria = Categoria::find($id);

        return view('categorias.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoriaRequest $request,$id)
    {
        $categoria = Categoria::find($id);
        $categoria->nombre = $request->get('nombre');
        $categoria->update();
        notify()->success('Categoria Editada Correctamente', 'LISTO');
        return Redirect::route('categorias.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
       
        $categoria= Categoria::find($id);
            $categoria->estado= 0;
            $categoria->save();
            notify()->success('Categoria Eliminada Correctamente', 'LISTO');
        
            return Redirect::route('categorias.index');
    }
}
