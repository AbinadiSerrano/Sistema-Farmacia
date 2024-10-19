@include('plantilla.head')
@include('plantilla.sidebar')
@include('plantilla.navuser')
{{-- aqui va todo el contenido --}}
 <!-- Page Heading -->
 <!-- DataTales Example -->
 <div class="container-fluid">
        <!-- Page Heading  -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Presentaciones</h1>
            <a  class=" btn btn-sm btn-primary shadow-sm"  class="dropdown-item" data-toggle="modal" data-target="#nuevoModal" href="" ><i
                    class="fas fa-solid fa-plus " ></i> Nuevo</a>
        </div>
        <!-- nuevo Modal-->
    <div class="modal fade" id="nuevoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Crear presentacion</h5>
                </div>
                <div class="modal-body">
                    <form action="{{ route('presentaciones.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input id="nombre" name="nombre" type="text" class="form-control">
                        </div>
                        <div class="modal-body">
                            <select class="form-control" name="categoria_id" id="categoria_id">
                                <label for="categoria_id">Categoría</label>
                                <option value="">Selecciona una categoría</option>
                                @foreach ($categorias as $categoria)
                                    <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="modal-footer">
                            <a class="btn btn-secondary" href="{{ route('presentaciones.index') }}">Cancelar</a>
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
    <div id="nombrep"class="alert alert-danger">
        {{ $errors->first('nombre') }}
    </div>
@endif
<!-- Mensaje de error para 'categoria_id' -->
@if ($errors->has('categoria_id'))
    <div id="categoriap" class="alert alert-danger">
        {{ $errors->first('categoria_id') }}
    </div>
@endif

<div class="container-fluid">
    <div class="card shadow mb-4">
         <div class="card-body">
            <div class="table-responsive">
                 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                     <thead>
                         <tr>
                            <th class="text-center">Presentacion</th>
                            <th class="text-center" >Estado</th>
                            <th class="text-center" >Categoria</th>
                            <th></th>
                         </tr>
                     </thead>
                    <tbody>
                        @foreach ($presentaciones as $presentacion)
                         <tr>
                                <td class="text-center">{{ $presentacion-> nombre}}</td>
                                <td class="text-center">
                                    @if ($presentacion->estado == 1)
                                        <span class="badge badge-success" >Activo</span>
                                    @else
                                        <span class="badge badge-danger">Inactivo</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if($presentacion->categorias->estado==1)
                                    {{ $presentacion->categorias->nombre}}
                                    @else
                                    {{ "null" }}
                                    @endif
                                </td>
                                <td >

                                        <div class="text-right">
                                            <a  href="{{--  --}}"data-toggle="modal" data-target="#showModal" class="btn btn-info btn-circle">
                                                <i class="fas fa-solid fa-eye"></i>
                                            </a>
                                            <a href="{{ route('presentaciones.edit', $presentacion->id) }}" class="btn btn-warning btn-circle">
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
                                                            <h5 class="modal-title" id="exampleModalLabel">Eliminar Presentacion</h5>
                                                        </div>
                                                        <div class="modal-body">
                                                            
                                                            <form action="{{ route('presentaciones.destroy',$presentacion->id) }}"method="POST">
                                                                <h6 style="padding-right: 80px">¿esta seguro que desea eliminar la Presentacion?</h6>
                                                                @csrf
                                                                @method('delete')
                                                                <div class="modal-footer">
                                                                    <a class="btn btn-secondary" href="{{ route('presentaciones.index') }}">Cancelar</a>
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
                                                            <h5 class="modal-title" id="exampleModalLabel">Ver Presentacion</h5>
                                                        </div>
                                                        <div class="modal-body">  
                                                                @csrf
                                                                <div style="text-align: left;">
                                                                    <strong>ID:</strong>
                                                                    {{ $presentacion->id }}
                                                                </div>
                                                                <div style="text-align: left;">
                                                                    <strong>PRESENTACION:</strong>
                                                                    {{ $presentacion->nombre }}
                                                                </div>
                                                                <div style="text-align: left;">
                                                                    <strong>CATEGORIA:</strong>
                                                                    {{ $presentacion->categorias->nombre }}
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <a class="btn btn-secondary" href="{{ route('presentaciones.index') }}">Volver</a>
                                                                    
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