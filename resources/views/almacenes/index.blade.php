@include('plantilla.head')
@include('plantilla.sidebar')
@include('plantilla.navuser')
{{-- aqui va todo el contenido --}}
 <!-- Page Heading -->
 <!-- DataTales Example -->
 <div class="container-fluid">
        <!-- Page Heading  -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Almacenes</h1>
            <a  class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"  class="dropdown-item" data-toggle="modal" data-target="#nuevoModal" href="" ><i
                    class="fas fa-solid fa-plus " ></i> Nuevo</a>
        </div>
        <!-- nuevo Modal-->
    <div class="modal fade" id="nuevoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Crear Almacen</h5>
                </div>
                <div class="modal-body">
                    <form action="{{ route('almacenes.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input id="nombre" name="nombre" type="text" class="form-control">
                        </div>
                        <div class="modal-body">
                            <label for="ubicacion" class="form-label">Ubicacion</label>
                            <input id="ubicacion" name="ubicacion" type="text" class="form-control">
                        </div>

                        <div class="modal-footer">
                            <a class="btn btn-secondary" href="{{ route('almacenes.index') }}">Cancelar</a>
                            <button class="btn btn-primary" type="submit">Guardar</button>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
 </div>
 @if ($errors->has('nombre'))
    <div  id="nombrea" class="alert alert-danger">
        {{ $errors->first('nombre') }}
    </div>
@endif
@if ($errors->has('ubicacion'))
    <div  id="ubicaciona" class="alert alert-danger">
        {{ $errors->first('ubicacion') }}
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
                            <th class="text-center">Ubicacion</th>
                            <th class="text-center" >Estado</th>
                            <th></th>
                         </tr>
                     </thead>
                    <tbody>
            
                        @foreach ($almacenes as $almacen)
                         <tr>
                                <td class="text-center">{{ $almacen-> nombre}}</td>
                                <td class="text-center">{{ $almacen-> ubicacion}}</td>
                                
                                
                                <td class="text-center">
                                    @if ($almacen->estado == 1)
                                        <span class="badge badge-success" >Activo</span>
                                    @else
                                        <span class="badge badge-danger">Inactivo</span>
                                    @endif
                                </td>
                                <td >

                                        <div class="text-right">
                                            <a  href="{{--  el ver lo hace directo  en el modal--}}"data-toggle="modal" data-target="#showModal" class="btn btn-info btn-circle">
                                                <i class="fas fa-solid fa-eye"></i>
                                            </a>
                                            <a href="{{ route('almacenes.edit', $almacen->id) }}" class="btn btn-warning btn-circle">{{-- btn editar --}}
                                                    <i class="fas fa-solid fa-marker"></i>
                                            </a>
                                                <a data-toggle="modal" data-target="#deleteModal"class="btn btn-danger btn-circle"  >
                                                    <i class="fas fas fa-trash"></i>                    {{-- btn eliminar --}}
                                                </a>
                                            {{-- Modal delete --}}
                                            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Eliminar Almacen</h5>
                                                        </div>
                                                        <div class="modal-body">
                                                            
                                                            <form action="{{ route('almacenes.destroy',$almacen->id) }}"method="POST">
                                                                <h6 style="padding-right: 80px">¿esta seguro que desea eliminar el Almacen?</h6>
                                                                @csrf
                                                                @method('delete')
                                                                <div class="modal-footer">
                                                                    <a class="btn btn-secondary" href="{{ route('almacenes.index') }}">Cancelar</a>
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
                                                            <h5 class="modal-title" id="exampleModalLabel">Ver Almacen</h5>
                                                        </div>
                                                        <div class="modal-body">  
                                                                @csrf
                                                                <div style="text-align: left;">
                                                                    <strong>ID:</strong>
                                                                    {{ $almacen->id }}
                                                                </div>
                                                                <div style="text-align: left;">
                                                                    <strong>NOMBRE:</strong>
                                                                    {{ $almacen->nombre }}
                                                                </div>
                                                                <div style="text-align: left;">
                                                                    <strong>UBICACION:</strong>
                                                                    {{ $almacen->ubicacion }}
                                                                </div>
                                                                <div style="text-align: left;">
                                                                    <strong>ESTADO:</strong>
                                                                    {{ $almacen->estado }}
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <a class="btn btn-secondary" href="{{ route('almacenes.index') }}">Volver</a>
                                                                    
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