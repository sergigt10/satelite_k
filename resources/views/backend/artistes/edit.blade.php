@extends('backend.layouts.app')

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
                        <form class="forms-sample" method="post" action="{{ route('backend.artistes.update', ['artista' => $artista->id]) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            @error('nom')
                                <div class='alert alert-danger' role='alert'>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                            @error('biografia_cat')
                                <div class='alert alert-danger' role='alert'>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                            @error('biografia_esp')
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
                                <input name="nom" type="text" class="form-control @error('nom') is-invalid @enderror" id="exampleInputEmail3" placeholder="Nom artista" value="{{ $artista->nom }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail3">Biografia CAT *:</label>
                                <input id="biografia_cat" type="hidden" name="biografia_cat" value="{{ $artista->biografia_cat }}">
                                <trix-editor 
                                    class="form-control @error('biografia_cat') is-invalid @enderror "
                                    input="biografia_cat">
                                </trix-editor>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail3">Biografia ESP *:</label>
                                <input id="biografia_esp" type="hidden" name="biografia_esp" value="{{ $artista->biografia_esp }}">
                                <trix-editor 
                                    class="form-control @error('biografia_esp') is-invalid @enderror "
                                    input="biografia_esp">
                                </trix-editor>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail3">Gènere musical *:</label>
                                <select id="generes_id" name="generes_id" class="form-control">
                                    @foreach ($generes as $genere)
                                        <option 
                                            value="{{ $genere->id }}"
                                            {{ $artista->id == $genere->id ? 'selected' : '' }}
                                        >
                                            {{ $genere->nom_cat }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail3">URL pàgina web:</label>
                                <input name="link_web" type="text" class="form-control" id="exampleInputEmail3" placeholder="URL pàgina web" value="{{ $artista->link_web }}">
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
                                                        <label>Imatge artista</label>
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
                                                        <img src="/storage/{{$artista->foto}}" style="width: 300px">
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js" integrity="sha512-wEfICgx3CX6pCmTy6go+PmYVKDdi4KHhKKz5Xx/boKOZOtG7+rrm2fP7RUR2o4m/EbPdwbKWnP05dvj4uzoclA==" crossorigin="anonymous" defer></script>
    <script src="{{ asset('backend/js/file-upload.js') }}"></script>
@endsection

@endsection