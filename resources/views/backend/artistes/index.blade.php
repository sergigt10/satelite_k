@extends('layouts.app')

@section('content')

    <!-- <h2 class="text-center mb-5">Administrar tus noticias</h2>

    <div class="col-md-10 mx-auto bg-white p-3">
        <table class="table">
            <thead class="bg-primary text-light">
                <tr>
                    <th scole="col">Título</th>
                    <th scole="col">Acciones</th>
                </tr>
            </thead>
            <tbody>

                @foreach($noticias as $noticia)
                    <tr>
                        <td>{{ $noticia->titulo }}</td>
                        <td>
                            <eliminar-noticia
                                noticia-id={{$noticia->id}}
                            ></eliminar-noticia>
                            <a href="{{ route('noticias.edit', ['noticia' => $noticia->id]) }}" class="btn btn-dark d-block mb-2">Editar</a>
                            <a href="{{ route('noticias.show', ['noticia' => $noticia->id]) }}" class="btn btn-success d-block mb-2">Ver</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="col-12 mt-4 justify-content-center d-flex">
            {{ $noticias->links() }}
        </div>

    </div> -->

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="card">
                <div class="card-body">
                    <!-- Missatges enviats desde el controller -->
                    @if(session('estado'))
                        <div class="alert alert-success" role="alert">
                            {{ session('estado') }}
                        </div>
                    @endif
                    <br>
                    <h2>Blog</h2>
                    <br>
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table id="order-listing" class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Títol</th>
                                            <th data-orderable="false">Editar</th>
                                            <th data-orderable="false">Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($noticias as $noticia)
                                            <tr>
                                                <td>
                                                    <a href="{{ route('noticias.edit', ['noticia' => $noticia->id]) }}" style="color: black;">
                                                        {{ $noticia->titulo }}
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="{{ route('noticias.edit', ['noticia' => $noticia->id]) }}" style="color: black;">
                                                        <i class="mdi mdi-pencil menu-icon"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="" style="color: black;" data-toggle="modal" data-target="#exampleModalCenter{{$noticia->id}}">
                                                        <i class="mdi mdi-close-circle menu-icon"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="exampleModalCenter{{$noticia->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Eliminar?</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                    <div class="modal-body">
                                                        Segur que vols esborrar: {{ $noticia->titulo }}
                                                    </div>
                                                        <div class="modal-footer">
                                                            <form class="pull-right" action="{{ route('noticias.destroy', ['noticia' => $noticia->id]) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <input type="submit" value="Esborrar" class="btn btn-danger">
                                                            </form>
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel·lar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>       

@endsection

@section('scripts')
    <script src="{{ asset('js/data-table.js') }}"></script>
@endsection