@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css" integrity="sha512-494Ejp/5WyoRNfh+nPLhSCQPHhcsbA5PoIGv2/FuEo+QLfW+L7JQGPdh8Qy2ZOmkF27pyYlALrxteMiKau1tyw==" crossorigin="anonymous" />
@endsection

@section('content')

    <div class="main-panel">        
        <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h2>Modificar notícia</h2>
                        <p> * Camps obligatoris </p>
                        <br>
                        <form class="forms-sample" method="post" action="{{ route('noticias.update', ['noticia' => $noticia->id]) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            @error('titulo')
                                <div class='alert alert-danger' role='alert'>
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            @error('descripcion')
                                <div class='alert alert-danger' role='alert'>
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            @error('imagen_1')
                                <div class='alert alert-danger' role='alert'>
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            @error('imagen_2')
                                <div class='alert alert-danger' role='alert'>
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            @error('imagen_3')
                                <div class='alert alert-danger' role='alert'>
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            @error('imagen_4')
                                <div class='alert alert-danger' role='alert'>
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            @error('video')
                                <div class='alert alert-danger' role='alert'>
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="form-group">
                                <label for="exampleInputEmail3">Titulo *:</label>
                                <input name="titulo" type="text" class="form-control @error('titulo') is-invalid @enderror" id="exampleInputEmail3" placeholder="titulo" value="{{ $noticia->titulo }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail3">Descripción:</label>
                                <input id="descripcion" type="hidden" name="descripcion" value="{{ $noticia->descripcion }}">
                                <trix-editor 
                                    class="form-control @error('descripcion') is-invalid @enderror "
                                    input="descripcion">
                                </trix-editor>
                            </div>
                            <div class="row grid-margin">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 style="color:red">Pujar imatges en format: jpg, png o gif</h4>
                                            <br>
                                            <div class="form-row">
                                                <div class="form-group col-md-9">
                                                    <div class="form-group">
                                                        <label>Pujar imatge 1</label>
                                                        <input name="imagen_1" type="file" class="file-upload-default">
                                                        <div class="input-group col-xs-12">
                                                            <input name="imagen_1" type="text" class="form-control @error('imagen_1') is-invalid @enderror file-upload-info" readonly="readonly" placeholder="Imatge 1" value="{{ old('imagen_1') }}">
                                                            <span class="input-group-append">
                                                                <button class="file-upload-browse btn btn-primary" type="button">Pujar imatge 1</button>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <div class="form-check form-check-danger" style="float:right;">
                                                        <img src="/storage/{{$noticia->imagen_1}}" style="width: 300px">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-9">
                                                    <div class="form-group">
                                                        <label>Pujar imatge 2</label>
                                                        <input name="imagen_2" type="file" class="file-upload-default">
                                                        <div class="input-group col-xs-12">
                                                            <input name="imagen_2" type="text" class="form-control @error('imagen_2') is-invalid @enderror file-upload-info" readonly="readonly" placeholder="Imatge 2" value="{{ old('imagen_2') }}">
                                                            <span class="input-group-append">
                                                                <button class="file-upload-browse btn btn-primary" type="button">Pujar imatge 2</button>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <div class="form-check form-check-danger" style="float:right;">
                                                        <img src="/storage/{{$noticia->imagen_2}}" style="width: 300px">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-9">
                                                    <div class="form-group">
                                                        <label>Pujar imatge 3</label>
                                                        <input name="imagen_3" type="file" class="file-upload-default">
                                                        <div class="input-group col-xs-12">
                                                            <input name="imagen_3" type="text" class="form-control @error('imagen_3') is-invalid @enderror file-upload-info" readonly="readonly" placeholder="Imatge 3" value="{{ old('imagen_3') }}">
                                                            <span class="input-group-append">
                                                                <button class="file-upload-browse btn btn-primary" type="button">Pujar imatge 3</button>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <div class="form-check form-check-danger" style="float:right;">
                                                        <img src="/storage/{{$noticia->imagen_3}}" style="width: 300px">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-9">
                                                    <div class="form-group">
                                                        <label>Pujar imatge 4</label>
                                                        <input name="imagen_4" type="file" class="file-upload-default">
                                                        <div class="input-group col-xs-12">
                                                            <input name="imagen_4" type="text" class="form-control @error('imagen_4') is-invalid @enderror file-upload-info" readonly="readonly" placeholder="Imatge 4" value="{{ old('imagen_4') }}">
                                                            <span class="input-group-append">
                                                                <button class="file-upload-browse btn btn-primary" type="button">Pujar imatge 4</button>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <div class="form-check form-check-danger" style="float:right;">
                                                        <img src="/storage/{{$noticia->imagen_4}}" style="width: 300px">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row grid-margin">
                                <div class="col-lg-12">
                                    <div class="card">
                                    <div class="card-body">
                                        <h4 style="color:red">Pujar només video en format MP4. Màxim 100 MB.</h4>
                                        <br>
                                        <div class="form-row">
                                        <div class="form-group col-md-9">
                                            <label>Pujar video</label>
                                            <input name="video" type="file" class="file-upload-default">
                                            <div class="input-group col-xs-12">
                                                <input name="video" type="text" class="form-control @error('video') is-invalid @enderror file-upload-info" readonly="readonly" placeholder="Video" value="{{ old('video') }}">
                                                <span class="input-group-append">
                                                    <button class="file-upload-browse btn btn-primary" type="button">Pujar video</button>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <!-- <div class="form-check form-check-danger" style="float:right;">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="del_video" value="1">
                                                Eliminar video?
                                                <i class="input-helper"></i></label>
                                            </div> -->
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            <button type="submit" name="funcioBoto" class="btn btn-primary mr-2" value="Guardar">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js" integrity="sha512-wEfICgx3CX6pCmTy6go+PmYVKDdi4KHhKKz5Xx/boKOZOtG7+rrm2fP7RUR2o4m/EbPdwbKWnP05dvj4uzoclA==" crossorigin="anonymous" defer></script>
    <script src="{{ asset('backend/js/file-upload.js') }}"></script>
@endsection

@endsection