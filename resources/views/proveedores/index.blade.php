@include('plantilla.head')
@include('plantilla.sidebar')
@include('plantilla.navuser')
{{-- aqui va todo el contenido --}}
 <!-- Page Heading -->
 <!-- DataTales Example -->
 <div class="container-fluid">
        <!-- Page Heading  -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Proveedores</h1>
            <a  class=" btn btn-sm btn-primary shadow-sm"  class="dropdown-item" data-toggle="modal" data-target="#nuevoModal" href="" ><i
                    class="fas fa-solid fa-plus " ></i> Nuevo</a>
        </div>
        <!-- nuevo Modal-->
    <div class="modal fade" id="nuevoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Crear Proveedor</h5>
                </div>
                <div class="modal-body">
                    <form action="{{ route('proveedores.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input id="nombre" name="nombre" type="text" class="form-control">
                        </div>
                        <div class="modal-body">
                            <label for="pais" class="form-label">Pais </label>
                            <input id="pais" name="pais" type="text" class="form-control">
                        </div>
                        <div class="modal-body">
                            <label for="ciudad" class="form-label">Ciudad</label>
                            <input id="ciudad" name="ciudad" type="text" class="form-control">
                        </div>
                        <div class="modal-body">
                            <label for="direccion" class="form-label">Direccion</label>
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
                        
                        <div class="modal-footer">
                            <a class="btn btn-secondary" href="{{ route('proveedores.index') }}">Cancelar</a>
                            <button class="btn btn-primary" type="submit">Guardar</button>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
 </div>
 @if ($errors->has('nombre'))
    <div  id="nombrepro" class="alert alert-danger">
        {{ $errors->first('nombre') }}
    </div>
@endif
@if ($errors->has('pais'))
<div  id="paispro" class="alert alert-danger">
    {{ $errors->first('pais') }}
</div>
@endif
@if ($errors->has('ciudad'))
<div  id="ciudadpro" class="alert alert-danger">
    {{ $errors->first('ciudad') }}
</div>
@endif
@if ($errors->has('direccion'))
<div  id="direccionpro" class="alert alert-danger">
    {{ $errors->first('direccion') }}
</div>
@endif
@if ($errors->has('correo'))
<div  id="correopro" class="alert alert-danger">
    {{ $errors->first('correo') }}
</div>
@endif
@if ($errors->has('telefono'))
<div  id="telefonopro" class="alert alert-danger">
    {{ $errors->first('telefono') }}
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
                            <th class="text-center">Pais</th>
                            <th class="text-center" >Ciudad</th>
                            <th class="text-center" >Direccion</th>
                            <th class="text-center">Correo</th>
                            <th class="text-center" >Telefono</th>
                            <th></th>
                         </tr>
                     </thead>
                    <tbody>
                        @foreach ($proveedores as $proveedor)
                         <tr>
                                <td class="text-center">{{ $proveedor-> nombre}}</td>
                                <td class="text-center">{{ $proveedor-> pais}}</td>
                                <td class="text-center">{{ $proveedor-> ciudad}}</td>
                                <td class="text-center">{{ $proveedor-> direccion}}</td>
                                <td class="text-center">{{ $proveedor-> correo}}</td>
                                <td class="text-center">{{ $proveedor-> telefono}}</td>
                        
                                <td >

                                        <div class="text-right">
                                            <a  href="{{--  lo hace java scrip en el modal--}}"data-toggle="modal" data-target="#showModal" class="btn btn-info btn-circle">
                                                <i class="fas fa-solid fa-eye"></i>
                                            </a>
                                            <a href="{{ route('proveedores.edit',$proveedor->id) }}" class="btn btn-warning btn-circle">
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
                                                            <h5 class="modal-title" id="exampleModalLabel">Eliminar Proveedor</h5>
                                                        </div>
                                                        <div class="modal-body">
                                                            
                                                            <form action="{{ route('proveedores.destroy',$proveedor->id) }}"method="POST">
                                                                <h6 style="padding-right: 80px">¿esta seguro que desea eliminar el proveedor?</h6>
                                                                @csrf
                                                                @method('delete')
                                                                <div class="modal-footer">
                                                                    <a class="btn btn-secondary" href="{{ route('proveedores.index') }}">Cancelar</a>
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
                                                            <h5 class="modal-title" id="exampleModalLabel">Ver Proveedor</h5>
                                                        </div>
                                                        <div class="modal-body">  
                                                                @csrf
                                                                <div style="text-align: left;">
                                                                    <strong>ID:</strong>
                                                                    {{ $proveedor->id }}
                                                                </div>
                                                                <div style="text-align: left;">
                                                                    <strong>NOMBRE:</strong>
                                                                    {{ $proveedor->nombre }}
                                                                </div>
                                                                <div style="text-align: left;">
                                                                    <strong>PAIS:</strong>
                                                                    {{ $proveedor->pais }}
                                                                </div>
                                                                <div style="text-align: left;">
                                                                    <strong>CIUDAD:</strong>
                                                                    {{ $proveedor->ciudad }}
                                                                </div>
                                                                <div style="text-align: left;">
                                                                    <strong>DIRECCION:</strong>
                                                                    {{ $proveedor->direccion }}
                                                                </div>
                                                                <div style="text-align: left;">
                                                                    <strong>CORREO:</strong>
                                                                    {{ $proveedor->correo }}
                                                                </div>
                                                                <div style="text-align: left;">
                                                                    <strong>TELEFONO:</strong>
                                                                    {{ $proveedor->telefono }}
                                                                </div>
                                                                <div style="text-align: left;">
                                                                    <strong>ESTADO:</strong>
                                                                    {{ $proveedor->estado }}
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <a class="btn btn-secondary" href="{{ route('proveedores.index') }}">Volver</a>
                                                                    
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