@include('plantilla.head')
@include('plantilla.sidebar')
@include('plantilla.navuser')

<section class="content container-fluid">
    <div style="padding-right:500px">
        <div class="col-md-12">

            <div class="card card-default">
                <div class="card-header">
                    <span class="card-title">Editar Categoria</span>
                </div>
                <div class="card-body bg-white">
                    <form method="POST" action="{{ route('categorias.update', $categoria->id) }}"  role="form" enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        @csrf

                        <div class="row padding-1 p-1">
                            <div class="col-md-12">
                                
                                <div class="form-group mb-2 mb20">
                                    <label for="name" class="form-label"><strong>Nombre</strong></label>
                                    <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $categoria?->nombre) }}" style="max-width: 500px;"id="name">
                                    @if ($errors->has('nombre'))
                                    <?php
                                        notify()->error('Por favor corrige los errores en el formulario.', 'ERROR');
                                    ?>
                                    <div class="alert alert-danger mt-2"id="nameError" class="alert alert-danger mt-2" style="display: none;">
                                        {{ $errors->first('nombre') }}
                                    </div>
                                    @endif

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