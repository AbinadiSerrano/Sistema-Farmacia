@include('plantilla.head')
@include('plantilla.sidebar')
@include('plantilla.navuser')
{{-- aqui va todo el contenido --}}
 <!-- Page Heading -->
 <!-- DataTales Example -->
 <div class="container-fluid">
        <!-- Page Heading  -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Medicamentos</h1>
            <a  class=" d-none d-sm-inline-block  btn btn-sm btn-primary shadow-sm "   class="dropdown-item" data-toggle="modal" data-target="#nuevoModal" href="" ><i
                    class="fas fa-solid fa-plus " ></i> Nuevo</a>
        </div>
        <!-- nuevo Modal-->
    <div class="modal fade" id="nuevoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Crear Medicamento</h5>
                </div>
                <div class="modal-body">
                    <form action="{{ route('medicamentos.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input id="nombre" name="nombre" type="text" class="form-control">
                        </div>
                        <div class="modal-body">
                            <label for="precio" class="form-label">Precio</label>
                            <input id="precio" name="precio" type="text" class="form-control">
                        </div>
                        <div class="modal-body">
                            <label for="fecha_vencimiento" class="form-label">Fecha Vencimiento</label>
                            <input id="fecha_vencimiento" name="fecha_vencimiento" type="date" class="form-control">
                        </div>
                        <div class="modal-body">
                            <label for="indicaciones" class="form-label">Indicaciones</label>
                            <textarea id="indicaciones" name="indicaciones" type="text" class="form-control"></textarea>
                        </div>
                        <div class="modal-body">
                            <select class="form-control" name="laboratorio_id" id="laboratorio_id">
                                <label for="laboratorio_id">Laboratorio</label>
                                <option value="">Selecciona un Laboratorio</option>
                                @foreach ($laboratorios as $laboratorio)
                                    <option value="{{ $laboratorio->id }}">{{ $laboratorio->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="modal-body">
                            <select class="form-control" name="presentacion_id" id="presentacion_id">
                                <label for="presentacion_id">Presentacion</label>
                                <option value="">Selecciona Presentacion</option>
                                @foreach ($presentaciones as $presentacion)
                                    <option value="{{ $presentacion->id }}">{{ $presentacion->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="modal-footer">
                            <a class="btn btn-secondary" href="{{ route('medicamentos.index') }}">Cancelar</a>
                            <button class="btn btn-primary" type="submit">Guardar</button>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
 </div>
 <!-- Mensaje de error para 'nombre' -->
 @if ($errors->has('nombre'))
    <div id="nombrem"class="alert alert-danger">
        {{ $errors->first('nombre') }}
    </div>
@endif
<!-- Mensaje de error para 'fecha vencimiento' -->
@if ($errors->has('precio'))
    <div id="preciom" class="alert alert-danger">
        {{ $errors->first('precio') }}
    </div>
@endif
 <!-- Mensaje de error para 'nombre' -->
 @if ($errors->has('fecha_vencimiento'))
    <div id="fecha_vencimientom"class="alert alert-danger">
        {{ $errors->first('nombre') }}
    </div>
@endif
<!-- Mensaje de error para 'fecha vencimiento' -->
@if ($errors->has('indicaciones'))
    <div id="indicacionesm" class="alert alert-danger">
        {{ $errors->first('indicaciones') }}
    </div>
@endif
 <!-- Mensaje de error para 'nombre' -->
 @if ($errors->has('laboratorio_id'))
    <div id="laboratorio_idm"class="alert alert-danger">
        {{ $errors->first('laboratorio_id') }}
    </div>
@endif
<!-- Mensaje de error para 'fecha vencimiento' -->
@if ($errors->has('presentacion_id'))
    <div id="presentacion_idm" class="alert alert-danger">
        {{ $errors->first('presentacion_id') }}
    </div>
@endif

<div class="container-fluid">
    <div class="card shadow mb-4">
         <div class="card-body">
            <div class="table-responsive">
                 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                     <thead>
                         <tr>
                            <th class="text-center">Nombre</th>
                            <th class="text-center" >Precio</th>
                            <th class="text-center" >Fecha Vencimiento</th>
                            <th class="text-center">Indicaciones</th>
                            <th class="text-center" >Laboratorio</th>
                            <th class="text-center" >Presentacion</th>
                            <th></th>
                         </tr>
                     </thead>
                    <tbody>
                        @foreach ($medicamentos as $medicamento)
                         <tr>
                                <td class="text-center">{{ $medicamento-> nombre}}</td>
                                <td class="text-center">{{ $medicamento-> precio}}</td>
                                <td class="text-center">{{ $medicamento-> fecha_vencimiento}}</td>
                                <td class="text-center">{{ $medicamento-> indicaciones}}</td>
                                <td class="text-center">{{ $medicamento->laboratorios->nombre}}</td>
                                <td class="text-center">{{ $medicamento->presentaciones->nombre}}</td>
                                <td >

                                        <div class="text-right">
                                            <a  href="{{--  --}}"data-toggle="modal" data-target="#showModal" class="btn btn-info btn-circle">
                                                <i class="fas fa-solid fa-eye"></i>
                                            </a>
                                            <a href="{{ route('medicamentos.edit', $medicamento->id) }}" class="btn btn-warning btn-circle">
                                                    <i class="fas fa-solid fa-marker"></i>
                                            </a>
                                                <a data-toggle="modal" data-target="#deleteModal"class="btn btn-danger btn-circle"  >
                                                    <i class="fas fas fa-trash"></i>
                                                </a>
                                            {{-- Modal delete --}}
                                            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Eliminar Medicamento</h5>
                                                        </div>
                                                        <div class="modal-body">
                                                            
                                                            <form action="{{ route('medicamentos.destroy',$medicamento->id) }}"method="POST">
                                                                <h6 style="padding-right: 80px">¿esta seguro que desea eliminar el Medicamento?</h6>
                                                                @csrf
                                                                @method('delete')
                                                                <div class="modal-footer">
                                                                    <a class="btn btn-secondary" href="{{ route('medicamentos.index') }}">Cancelar</a>
                                                                    <button class="btn btn-danger" type="submit">Eliminar</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- Modal Ver --}}
                                            <div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Ver Medicamentos</h5>
                                                        </div>
                                                        <div class="modal-body">  
                                                                @csrf
                                                                <div style="text-align: left;">
                                                                    <strong>ID:</strong>
                                                                    {{ $medicamento->id }}
                                                                </div>
                                                                <div style="text-align: left;">
                                                                    <strong>MEDICAMENTO:</strong>
                                                                    {{ $medicamento->nombre }}
                                                                </div>
                                                                <div style="text-align: left;">
                                                                    <strong>FECHA VENCIMIENTO:</strong>
                                                                    {{ $medicamento->fecha_vencimiento }}
                                                                </div>
                                                                <div style="text-align: left;">
                                                                    <strong>INDICACIONES:</strong>
                                                                    {{ $medicamento->indicaciones }}
                                                                </div>
                                                                <div style="text-align: left;">
                                                                    <strong>LABORATORIO:</strong>
                                                                    {{ $medicamento->laboratorios->nombre }}
                                                                </div>
                                                                <div style="text-align: left;">
                                                                    <strong>PRESENTACION:</strong>
                                                                    {{ $medicamento->presentaciones->nombre }}
                                                                </div>
                                                                <div style="text-align: left;">
                                                                    <strong>CATEGORIA:</strong>
                                                                    {{ $medicamento->presentaciones->categorias->nombre }}
                                                                </div>
                                                                <div style="text-align: left;">
                                                                    <strong>ESTADO:</strong>
                                                                    {{ $medicamento->estado }}
                                                                </div>

                                                                <div class="modal-footer">
                                                                    <a class="btn btn-secondary" href="{{ route('medicamentos.index') }}">Volver</a>
                                                                    
                                                                </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        
                                         </div>
                                                
                                    </form>
                                    </div>
                                </td>
                            </tr>
                       @endforeach  
                    </tbody>
                </table>
             </div>
        </div>
    
    </div>
</div>

@include('plantilla.script')