@extends('backend.layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('backend/vendors/jquery-asColorPicker/css/asColorPicker.min.css') }}">
@endsection

@section('content')

    <div class="main-panel">        
        <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h2>Modificar slide</h2>
                        <p> * Camps obligatoris </p>
                        <br>
                        <form class="forms-sample" method="post" action="{{ route('backend.sliders.update', ['slider' => $slider->id]) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
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
                            @error('color_nom_artista')
                                <div class='alert alert-danger' role='alert'>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                            @error('color_titol_disc')
                                <div class='alert alert-danger' role='alert'>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                            @error('color_titol_url')
                                <div class='alert alert-danger' role='alert'>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                            @error('foto')
                                <div class='alert alert-danger' role='alert'>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror

                            <div class="form-group">
                                <label for="exampleInputEmail3">Nom artista *:</label>
                                <input name="nom_artista" type="text" class="form-control @error('nom_artista') is-invalid @enderror" id="exampleInputEmail3" placeholder="Nom artista" value="{{ $slider->nom_artista }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail3">Color nom de l'artista *:</label>
                                <input name="color_nom_artista" type='text' class="color-picker @error('color_nom_artista') is-invalid @enderror" value="{{ $slider->color_nom_artista }}" />
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail3">Nom disc *:</label>
                                <input name="nom_disc" type="text" class="form-control @error('nom_disc') is-invalid @enderror" id="exampleInputEmail3" placeholder="Nom disc" value="{{ $slider->nom_disc }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail3">Color títol del disc *:</label>
                                <input name="color_titol_disc" type='text' class="color-picker @error('color_titol_disc') is-invalid @enderror" value="{{ $slider->color_titol_disc }}" />
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail3">URL:</label>
                                <input name="url_link" type="text" class="form-control" id="exampleInputEmail3" placeholder="URL" value="{{ $slider->url_link }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail3">Títol URL CAT:</label>
                                <input name="titol_link_cat" type="text" class="form-control" id="exampleInputEmail3" placeholder="Títol URL CAT" value="{{ $slider->titol_link_cat }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail3">Títol URL ESP:</label>
                                <input name="titol_link_esp" type="text" class="form-control" id="exampleInputEmail3" placeholder="Títol URL ESP" value="{{ $slider->titol_link_esp }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail3">Color títol URL *:</label>
                                <input name="color_titol_url" type='text' class="color-picker @error('color_titol_url') is-invalid @enderror" value="{{ $slider->color_titol_url }}" />
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail3">Ordre slide *:</label>
                                <select id="ordre" name="ordre" class="form-control js-example-basic-single w-100">
                                        <option 
                                            value="1"
                                            {{ $slider->ordre == 1 ? 'selected' : '' }}
                                        >
                                            1
                                        </option>
                                        <option 
                                            value="2"
                                            {{ $slider->ordre == 2 ? 'selected' : '' }}
                                        >
                                            2
                                        </option>
                                        <option 
                                            value="3"
                                            {{ $slider->ordre == 3 ? 'selected' : '' }}
                                        >
                                            3
                                        </option>
                                        <option 
                                            value="4"
                                            {{ $slider->ordre == 4 ? 'selected' : '' }}
                                        >
                                            4
                                        </option>
                                </select>
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
                                                        <label>Imatge slide</label>
                                                        <input name="foto" type="file" class="file-upload-default">
                                                        <div class="input-group col-xs-12">
                                                            <input name="foto" type="text" class="form-control @error('foto') is-invalid @enderror file-upload-info" readonly="readonly" placeholder="Foto" value="{{ old('foto') }}">
                                                            <span class="input-group-append">
                                                                <button class="file-upload-browse btn btn-primary" type="button">Cercar imatge</button>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <div class="form-check form-check-danger" style="float:right;">
                                                        <img src='{{ asset("/storage/$slider->foto") }}' alt="Satélite K" with=200 height=92>
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
    <script src="{{ asset('backend/vendors/jquery-asColorPicker/jquery-asColorPicker.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.js') }}"></script>
    <script src="{{ asset('backend/js/formpickers.js') }}"></script>
@endsection

@endsection