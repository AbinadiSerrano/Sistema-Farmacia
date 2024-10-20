@include('plantilla.head')
@include('plantilla.sidebar')
@include('plantilla.navuser')
{{-- aqui va todo el contenido --}}
 <!-- Page Heading -->
 <!-- DataTales Example -->
 <div class="container-fluid">
        <!-- Page Heading  -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">laboratorios</h1>
            <a  class=" btn btn-sm btn-primary shadow-sm"  class="dropdown-item" data-toggle="modal" data-target="#nuevoModal" href="" ><i
                    class="fas fa-solid fa-plus " ></i> Nuevo</a>
        </div>
        <!-- nuevo Modal-->
    <div class="modal fade" id="nuevoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Crear Laboratorio</h5>
                </div>
                <div class="modal-body">
                    <form action="{{ route('laboratorios.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input id="nombre" name="nombre" type="text" class="form-control">
                        </div>
                        <div class="modal-body">
                            <label for="direccion" class="form-label">Direccion </label>
                            <input id="direccion" name="direccion" type="text" class="form-control">
                        </div>
                        <div class="modal-body">
                            <label for="correo" class="form-label">Correo Electronico</label>
                            <input id="correo" name="correo" type="email" class="form-control">
                        </div>
                        <div class="modal-body">
                            <label for="telefono" class="form-label">Telefono</label>
                            <input id="telefono" name="telefono" type="number" class="form-control">
                        </div>
                        <div class="modal-body">
                            <label for="pais" class="form-label">Pais</label>
                            <input id="pais" name="pais" type="text" class="form-control">
                        </div>
                        <div class="modal-body">
                            <label for="ciudad" class="form-label">Ciudad</label>
                            <input id="ciudad" name="ciudad" type="text" class="form-control">
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
 @if ($errors->has('nombre'))
    <div  id="nombrel" class="alert alert-danger">
        {{ $errors->first('nombre') }}
    </div>
@endif
@if ($errors->has('direccion'))
<div  id="direccionl" class="alert alert-danger">
    {{ $errors->first('direccion') }}
</div>
@endif
@if ($errors->has('correo'))
<div  id="correol" class="alert alert-danger">
    {{ $errors->first('correo') }}
</div>
@endif
@if ($errors->has('telefono'))
<div  id="telefonol" class="alert alert-danger">
    {{ $errors->first('telefono') }}
</div>
@endif
@if ($errors->has('pais'))
<div  id="paisl" class="alert alert-danger">
    {{ $errors->first('pais') }}
</div>
@endif
@if ($errors->has('ciudad'))
<div  id="ciudadl" class="alert alert-danger">
    {{ $errors->first('ciudad') }}
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
                            <th class="text-center" >Direccion</th>
                            <th class="text-center">Correo</th>
                            <th class="text-center" >Telefono</th>
                            <th class="text-center">Pais</th>
                            <th class="text-center" >Ciudad</th>
                            <th class="text-center" >Estado</th>
                            <th></th>
                         </tr>
                     </thead>
                    <tbody>
                        @foreach ($laboratorios as $laboratorio)
                         <tr>
                                <td class="text-center">{{ $laboratorio-> nombre}}</td>
                                <td class="text-center">{{ $laboratorio-> direccion}}</td>
                                <td class="text-center">{{ $laboratorio-> correo}}</td>
                                <td class="text-center">{{ $laboratorio-> telefono}}</td>
                                <td class="text-center">{{ $laboratorio-> pais}}</td>
                                <td class="text-center">{{ $laboratorio-> ciudad}}</td>
                            
                                <td class="text-center">
                                    @if ($laboratorio->estado == 1)
                                        <span class="badge badge-success" >Activo</span>
                                    @else
                                        <span class="badge badge-danger">Inactivo</span>
                                    @endif
                                </td>
                                <td >

                                        <div class="text-right">
                                            <a  href="{{--  lo hace java scrip en el modal--}}"data-toggle="modal" data-target="#showModal" class="btn btn-info btn-circle">
                                                <i class="fas fa-solid fa-eye"></i>
                                            </a>
                                            <a href="{{ route('laboratorios.edit', $laboratorio->id) }}" class="btn btn-warning btn-circle">
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
                                                            <h5 class="modal-title" id="exampleModalLabel">Eliminar Laboratorio</h5>
                                                        </div>
                                                        <div class="modal-body">
                                                            
                                                            <form action="{{ route('laboratorios.destroy',$laboratorio->id) }}"method="POST">
                                                                <h6 style="padding-right: 80px">¿esta seguro que desea eliminar el laboratorio?</h6>
                                                                @csrf
                                                                @method('delete')
                                                                <div class="modal-footer">
                                                                    <a class="btn btn-secondary" href="{{ route('laboratorios.index') }}">Cancelar</a>
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
                                                            <h5 class="modal-title" id="exampleModalLabel">Ver Laboratorio</h5>
                                                        </div>
                                                        <div class="modal-body">  
                                                                @csrf
                                                                <div style="text-align: left;">
                                                                    <strong>ID:</strong>
                                                                    {{ $laboratorio->id }}
                                                                </div>
                                                                <div style="text-align: left;">
                                                                    <strong>NOMBRE:</strong>
                                                                    {{ $laboratorio->nombre }}
                                                                </div>
                                                                <div style="text-align: left;">
                                                                    <strong>DIRECCION:</strong>
                                                                    {{ $laboratorio->direccion }}
                                                                </div>
                                                                <div style="text-align: left;">
                                                                    <strong>CORREO:</strong>
                                                                    {{ $laboratorio->correo }}
                                                                </div>
                                                                <div style="text-align: left;">
                                                                    <strong>TELEFONO:</strong>
                                                                    {{ $laboratorio->telefono }}
                                                                </div>
                                                                <div style="text-align: left;">
                                                                    <strong>PAIS:</strong>
                                                                    {{ $laboratorio->pais }}
                                                                </div>
                                                                <div style="text-align: left;">
                                                                    <strong>CIUDAD:</strong>
                                                                    {{ $laboratorio->ciudad }}
                                                                </div>
                                                                <div style="text-align: left;">
                                                                    <strong>ESTADO:</strong>
                                                                    {{ $laboratorio->estado }}
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <a class="btn btn-secondary" href="{{ route('laboratorios.index') }}">Volver</a>
                                                                    
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