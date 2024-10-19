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
                    <form method="POST" action="{{ route('medicamentos.update', $medicamento->id) }}"  role="form" enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        @csrf

                        <div class="row padding-1 p-1">
                            <div class="col-md-12">
                                
                                <div class="form-group mb-2 mb20">
                                    <label for="nombre" class="form-label"><strong>Nombre</strong></label>
                                    <input id="nombre"type="text" name="nombre" class="form-control" value="{{ old('nombre', $medicamento?->nombre) }}" style="max-width: 500px;">
                                            <!-- Mensaje de error para 'nombre' -->
                                        @if ($errors->has('nombre'))
                                            <div id="nombrem"class="alert alert-danger">
                                                {{ $errors->first('nombre') }}
                                            </div>
                                         @endif
                                    <label for="precio" class="form-label"><strong>Precio</strong></label>
                                    <input id="precio"type="text" name="precio" class="form-control" value="{{ old('medicamento', $medicamento?->precio) }}" style="max-width: 500px;">
                                                 <!-- Mensaje de error para 'nombre' -->
                                         @if ($errors->has('precio'))
                                                 <div id="preciom"class="alert alert-danger">
                                                     {{ $errors->first('precio') }}
                                                 </div>
                                         @endif
                                    <label for="nombre" class="form-label"><strong>Fecha de Vencimiento</strong></label>
                                    <input id="fecha_vencimiento"type="date" name="fecha_vencimiento" class="form-control" value="{{ old('medicamento', $medicamento?->fecha_vencimiento) }}" style="max-width: 500px;">
                                                      <!-- Mensaje de error para 'nombre' -->
                                         @if ($errors->has('fecha_vencimiento'))
                                                <div id="fecha_vencimientom"class="alert alert-danger">
                                                     {{ $errors->first('fecha_vencimiento') }}
                                                 </div>
                                         @endif

                                    <span class="input-group-text"><i class="fas fa-solid fa-image"></i><strong style="margin-left: 5px;">Imagen</strong></span>
                                    <input id="imagen" name="imagen" type="file" class="form-control"accept="image/*" value="{{ old('medicamento', $medicamento?->imagen)}}"alt="{{ $medicamento->nombre }}">
                                    
                                    <label for="indicaciones" class="form-label"><strong>Indicaciones</strong></label>
                                    <textarea id="indicaciones"type="textarea" name="indicaciones" class="form-control" value="{{ old('medicamento', $medicamento?->indicaciones) }}" style="max-width: 500px;"></textarea>
                                                      <!-- Mensaje de error para 'nombre' -->
                                        @if ($errors->has('indicaciones'))
                                                <div id="indicacionesm"class="alert alert-danger">
                                                     {{ $errors->first('indicaciones') }}
                                                </div>
                                        @endif
                                     <div style="padding-top: 10px">
                                        <label for="name" class="form-label"><strong>Laboratorio</strong></label>
                                        <select class="form-control" name="laboratorio_id" id="laboratorio_id">
                                            
                                            <option value="">Selecciona un Laboratorio</option>
                                            @foreach ($laboratorios as $laboratorio)
                                                <option value="{{ $laboratorio->id }}"{{ (old('laboratorio_id', $medicamento->laboratorio_id) == $laboratorio->id) ? 'selected' : '' }}>{{ $laboratorio->nombre }}</option>
                                            @endforeach
                                        </select>
                                                     <!-- Mensaje de error para 'categoria_id' -->
                                          @if ($errors->has('laboratorio_id'))
                                             <div id="laboratorio_idm" class="alert alert-danger">
                                                         {{ $errors->first('laboratorio_id') }}
                                            </div>
                                           @endif
                                     </div>

                                     <div style="padding-top: 10px">
                                        <label for="presentacion_id" class="form-label"><strong>Presentacion</strong></label>
                                        <select class="form-control" name="presentacion_id" id="presentacion_id">
                                            
                                            <option value="">Selecciona una presentacion</option>
                                            @foreach ($presentaciones as $presentacion)
                                                <option value="{{ $presentacion->id }}"{{ (old('presentacion_id', $medicamento->presentacion_id) == $presentacion->id) ? 'selected' : '' }}>{{ $presentacion->nombre }}</option>
                                            @endforeach
                                        </select>
                                                     <!-- Mensaje de error para 'categoria_id' -->
                                          @if ($errors->has('presentacion_id'))
                                             <div id="presentacion_idm" class="alert alert-danger">
                                                         {{ $errors->first('presentacion_id') }}
                                            </div>
                                           @endif
                                     </div>
                                     
                                </div>
                           
                            </div>
                            <div class="col-md-12 mt20 mt-2">
                                
                                <a class="btn btn-secondary" href="{{ route('medicamentos.index') }}">Cancelar</a>
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