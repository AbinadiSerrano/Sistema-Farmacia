@include('plantilla.head')
@include('plantilla.sidebar')
@include('plantilla.navuser')

<section class="content container-fluid">
    <div style="padding-right:500px">
        <div class="col-md-12">

            <div class="card card-default">
                <div class="card-header">
                    <span class="card-title">Editar Proveedor</span>
                </div>
                <div class="card-body bg-white">
                    <form method="POST" action="{{ route('proveedores.update', $proveedor->id) }}"  role="form" enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        @csrf

                        <div class="row padding-1 p-1">
                            <div class="col-md-12">
                                
                                <div class="form-group mb-2 mb20">
                                    <label for="name" class="form-label"><strong>Nombre</strong></label>
                                    <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $proveedor?->nombre) }}" style="max-width: 500px;"id="nombre">
                                    @if ($errors->has('nombre'))
                                    <div  id="nombrepro" class="alert alert-danger">
                                        {{ $errors->first('nombre') }}
                                    </div>
                                    @endif
                                <div class="form-group mb-2 mb20">
                                    <label for="pais" class="form-label"><strong>Pais</strong></label>
                                    <input type="text" name="pais" class="form-control" value="{{ old('pais', $proveedor?->pais) }}" style="max-width: 500px;"id="pais">
                                    @if ($errors->has('pais'))
                                    <div  id="paispro" class="alert alert-danger">
                                        {{ $errors->first('pais') }}
                                    </div>
                                    @endif
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <label for="ciudad" class="form-label"><strong>Ciudad</strong></label>
                                    <input type="text" name="ciudad" class="form-control" value="{{ old('ciudad', $proveedor?->ciudad) }}" style="max-width: 500px;"id="ciudad">
                                    @if ($errors->has('ciudad'))
                                    <div  id="ciudadpro" class="alert alert-danger">
                                        {{ $errors->first('ciudad') }}
                                    </div>
                                    @endif
                                </div>
                            </div><div class="form-group mb-2 mb20">
                                <label for="direccion" class="form-label"><strong>Direccion</strong></label>
                                <input type="text" name="direccion" class="form-control" value="{{ old('direccion', $proveedor?->direccion) }}" style="max-width: 500px;"id="direccion">
                                @if ($errors->has('direccion'))
                                <div  id="direccionpro" class="alert alert-danger">
                                    {{ $errors->first('direccion') }}
                                </div>
                                @endif
                            </div>
                            <div class="form-group mb-2 mb20">
                                <label for="correo" class="form-label"><strong>Correo</strong></label>
                                <input type="email" name="correo" class="form-control" value="{{ old('correo', $proveedor?->correo) }}" style="max-width: 500px;"id="correo">
                                @if ($errors->has('correo'))
                                <div  id="correopro" class="alert alert-danger">
                                    {{ $errors->first('correo') }}
                                </div>
                                @endif
                            </div>
                            <div class="form-group mb-2 mb20">
                                <label for="telefono" class="form-label"><strong>Telefono</strong></label>
                                <input type="number" name="telefono" class="form-control" value="{{ old('telefono', $proveedor?->telefono) }}" style="max-width: 500px;"id="telefono">
                                @if ($errors->has('telefono'))
                                <div  id="telefonopro" class="alert alert-danger">
                                    {{ $errors->first('telefono') }}
                                </div>
                                @endif
                            </div>

                           
                            </div>
                            <div class="col-md-12 mt20 mt-2">
                                
                                <a class="btn btn-secondary" href="{{ route('proveedores.index') }}">Cancelar</a>
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