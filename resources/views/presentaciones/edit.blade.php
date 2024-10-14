@include('plantilla.head')
@include('plantilla.sidebar')
@include('plantilla.navuser')

<section class="content container-fluid">
    <div style="padding-right:500px">
        <div class="col-md-12">

            <div class="card card-default">
                <div class="card-header">
                    <span class="card-title">Editar Presentacion</span>
                </div>
                <div class="card-body bg-white">
                    <form method="POST" action="{{ route('presentaciones.update', $presentacion->id) }}"  role="form" enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        @csrf

                        <div class="row padding-1 p-1">
                            <div class="col-md-12">
                                
                                <div class="form-group mb-2 mb20">
                                    <label for="name" class="form-label"><strong>Nombre</strong></label>
                                    <input id="nombre"type="text" name="nombre" class="form-control" value="{{ old('nombre', $presentacion?->nombre) }}" style="max-width: 500px;"id="name">
                                            <!-- Mensaje de error para 'nombre' -->
                                        @if ($errors->has('nombre'))
                                            <div id="nombrep"class="alert alert-danger">
                                                {{ $errors->first('nombre') }}
                                            </div>
                                         @endif
                                     <div style="padding-top: 10px">
                                        <label for="name" class="form-label"><strong>Categoria</strong></label>
                                        <select class="form-control" name="categoria_id" id="categoria_id">
                                            <label for="categoria_id">Categoría</label>
                                            <option value="">Selecciona una categoría</option>
                                            @foreach ($categorias as $categoria)
                                                <option value="{{ $categoria->id }}"{{ (old('categoria_id', $presentacion->categoria_id) == $categoria->id) ? 'selected' : '' }}>{{ $categoria->nombre }}</option>
                                            @endforeach
                                        </select>
                                                     <!-- Mensaje de error para 'categoria_id' -->
                                          @if ($errors->has('categoria_id'))
                                             <div id="categoriap" class="alert alert-danger">
                                                         {{ $errors->first('categoria_id') }}
                                            </div>
                                           @endif
                                     </div>
                                     
                                </div>
                           
                            </div>
                            <div class="col-md-12 mt20 mt-2">
                                
                                <a class="btn btn-secondary" href="{{ route('categorias.index') }}">Cancelar</a>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@include('plantilla.script')