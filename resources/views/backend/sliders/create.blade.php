@extends('backend.layouts.app')

@section('styles')

@endsection

@section('content')

    <div class="main-panel">        
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h2>Inserir nou slide</h2>
                            <p> * Camps obligatoris </p>
                            <br>
                            <form class="forms-sample" method="POST" action="{{ route('backend.sliders.store') }}" enctype="multipart/form-data" novalidate>
                                @csrf
                                @error('nom_artista')
                                    <div class='alert alert-danger' role='alert'>
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                                @error('nom_disc')
                                    <div class='alert alert-danger' role='alert'>
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror

                                <div class="form-group">
                                    <label for="exampleInputEmail3">Nom artista *:</label>
                                    <input name="nom_artista" type="text" class="form-control @error('nom_artista') is-invalid @enderror" id="exampleInputEmail3" placeholder="Nom artista" value="{{ old('nom_artista') }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Nom disc *:</label>
                                    <input name="nom_disc" type="text" class="form-control @error('nom_disc') is-invalid @enderror" id="exampleInputEmail3" placeholder="Nom disc" value="{{ old('nom_disc') }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">URL:</label>
                                    <input name="url_link" type="text" class="form-control" id="exampleInputEmail3" placeholder="URL" value="{{ old('url_link') }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Títol URL CAT:</label>
                                    <input name="titol_link_cat" type="text" class="form-control" id="exampleInputEmail3" placeholder="Títol URL CAT" value="{{ old('titol_link_cat') }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Títol URL ESP:</label>
                                    <input name="titol_link_esp" type="text" class="form-control" id="exampleInputEmail3" placeholder="Títol URL ESP" value="{{ old('titol_link_esp') }}">
                                </div>
                                <div class="row grid-margin">
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 style="color:red">Pujar imatges en format: jpg, png o gif</h4>
                                                <br>
                                                <div class="form-row">
                                                    <div class="form-group col-md-12">
                                                    <div class="form-group">
                                                        <label>Imatge slide</label>
                                                        <input name="foto" type="file" class="file-upload-default">
                                                        <div class="input-group col-xs-12">
                                                            <input name="foto" type="text" class="form-control @error('foto') is-invalid @enderror file-upload-info" readonly="readonly" placeholder="Foto" value="{{ old('foto') }}">
                                                            <span class="input-group-append">
                                                                <button class="file-upload-browse btn btn-primary" type="button">Cercar foto</button>
                                                            </span>
                                                        </div>
                                                    </div>
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
    <script src="{{ asset('backend/js/file-upload.js') }}"></script>
@endsection

@endsection