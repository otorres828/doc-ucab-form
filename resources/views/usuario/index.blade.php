@extends('adminlte::page')

@section('title', 'Lista de Documentos')

@section('content_header')
    <h1>Lista de Documentos Manual de Usuario</h1>
@stop

@section('content')
    <div class="container mx-auto">
        <x-alert />
        <div class="mb-3">
            <a class="btn btn-primary " href="{{ route('manual.usuario.create') }}">Crear Documento</a>
        </div>
        <div class="pb-4">
            <div class="table-responsive ">
                <table class="table" id="example">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">#id</th>
                            <th scope="col" class="text-sm">Titulo del documento</th>
                            <th scope="col" class="text-sm">Categoria</th>
                            <th scope="col" class="text-center">Acciones</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($documentos as $anuncio)
                            <tr>
                                <td class="text-center">{{ $anuncio->id }}</td>
                                <td>{{ $anuncio->name }}</td>
                                <td>{{ $anuncio->category->name }}</td>

                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            Acciones
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                            <a class="dropdown-item"
                                                href="{{ route('manual.usuario.edit', $anuncio) }}">Editar</a>
                                            <form class="destroy" action="{{ route('manual.usuario.destroy', $anuncio->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="dropdown-item">Eliminar</button>
                                            </form>

                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
@endsection

@section('js')
    <script>
        $('.destroy').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: '¿Estas Seguro?',
                text: "que quieres eliminar la Noticia!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Confirmar',
                cancelButtonText: 'Cancelar'

            }).then((result) => {
                if (result.isConfirmed) {
                    // Swal.fire(
                    // 'Eliminado!',
                    // 'La red se ha eliminado con exito',
                    // 'success'
                    // )
                    this.submit();
                }
            })
        });
    </script>
    <x-scrip-table-blog />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
@endsection
