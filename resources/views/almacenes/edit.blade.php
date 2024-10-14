@include('plantilla.head')
@include('plantilla.sidebar')
@include('plantilla.navuser')

<section class="content container-fluid">
    <div style="padding-right:500px">
        <div class="col-md-12">

            <div class="card card-default">
                <div class="card-header">
                    <span class="card-title">Editar Almacen</span>
                </div>
                <div class="card-body bg-white">
                    <form method="POST" action="{{ route('almacenes.update', $almacen->id) }}"  role="form" enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        @csrf
                        
                        <div class="row padding-1 p-1">
                            <div class="col-md-12">
                                
                                <div class="form-group mb-2 mb20">
                                    <label for="nombre" class="form-label"><strong>Nombre</strong></label>
                                    <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $almacen?->nombre) }}" style="max-width: 500px;"id="nombre">
                                    @if ($errors->has('nombre'))
                                    <div  id="nombrea" class="alert alert-danger">
                                        {{ $errors->first('nombre') }}
                                    </div>
                                    @endif
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <label for="ubicacion" class="form-label"><strong>Ubicacion</strong></label>
                                    <input type="text" name="ubicacion" class="form-control" value="{{ old('ubicacion', $almacen?->ubicacion) }}" style="max-width: 500px;"id="ubicacion">
                                    @if ($errors->has('ubicacion'))
                                    <div  id="ubicaciona" class="alert alert-danger">
                                        {{ $errors->first('ubicacion') }}
                                    </div>
                                    @endif
                                </div>
                                
                            </div>
                            <div class="col-md-12 mt20 mt-2">
                                
                                <a class="btn btn-secondary" href="{{ route('almacenes.index') }}">Cancelar</a>
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