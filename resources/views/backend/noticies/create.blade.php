@extends('backend.layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css" integrity="sha512-494Ejp/5WyoRNfh+nPLhSCQPHhcsbA5PoIGv2/FuEo+QLfW+L7JQGPdh8Qy2ZOmkF27pyYlALrxteMiKau1tyw==" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('backend/vendors/css/vendor.bundle.addons.css') }}">
@endsection

@section('content')

    <div class="main-panel">        
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h2>Inserir nova notícia</h2>
                            <p> * Camps obligatoris </p>
                            <br>
                            <form class="forms-sample" method="POST" action="{{ route('backend.noticies.store') }}" enctype="multipart/form-data" novalidate>
                                @csrf
                                @error('titol_cat')
                                    <div class='alert alert-danger' role='alert'>
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                                @error('titol_esp')
                                    <div class='alert alert-danger' role='alert'>
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                                @error('descripcio_cat')
                                    <div class='alert alert-danger' role='alert'>
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                                @error('descripcio_esp')
                                    <div class='alert alert-danger' role='alert'>
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                                @error('foto')
                                    <div class='alert alert-danger' role='alert'>
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                                @error('artistes_id')
                                    <div class='alert alert-danger' role='alert'>
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror

                                <div class="form-group">
                                    <label for="exampleInputEmail3">Títol CAT *:</label>
                                    <input name="titol_cat" type="text" class="form-control @error('titol_cat') is-invalid @enderror" id="exampleInputEmail3" placeholder="Títol CAT" value="{{ old('titol_cat') }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Títol ESP *:</label>
                                    <input name="titol_esp" type="text" class="form-control @error('titol_esp') is-invalid @enderror" id="exampleInputEmail3" placeholder="Títol ESP" value="{{ old('titol_esp') }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Descripció CAT *:</label>
                                    <input id="descripcio_cat" type="hidden" name="descripcio_cat" value="{{ old('descripcio_cat') }}">
                                    <trix-editor 
                                        class="form-control @error('descripcio_cat') is-invalid @enderror "
                                        input="descripcio_cat">
                                    </trix-editor>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Descripció ESP *:</label>
                                    <input id="descripcio_esp" type="hidden" name="descripcio_esp" value="{{ old('descripcio_esp') }}">
                                    <trix-editor 
                                        class="form-control @error('descripcio_esp') is-invalid @enderror "
                                        input="descripcio_esp">
                                    </trix-editor>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Artista *:</label>
                                    <select id="artistes_id" name="artistes_id" class="form-control js-example-basic-single w-100">
                                        <option></option>
                                        @foreach ($artistes as $artista)
                                            <option 
                                                value="{{ $artista->id }}"
                                                {{ old('artistes_id') == $artista->id ? 'selected' : '' }}
                                            >
                                                {{ $artista->nom }}
                                            </option>
                                        @endforeach
                                    </select>
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
                                                        <label>Imatge notícia</label>
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
                                <div class="row grid-margin">
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 style="color:red">Pujar imatges en format: jpg, png o gif</h4>
                                                <br>
                                                <div class="form-row">
                                                    <div class="form-group col-md-12">
                                                    <div class="form-group">
                                                        <label>Imatge notícia 2</label>
                                                        <input name="foto2" type="file" class="file-upload-default">
                                                        <div class="input-group col-xs-12">
                                                            <input name="foto2" type="text" class="form-control @error('foto2') is-invalid @enderror file-upload-info" readonly="readonly" placeholder="Foto 2" value="{{ old('foto2') }}">
                                                            <span class="input-group-append">
                                                                <button class="file-upload-browse btn btn-primary" type="button">Cercar foto 2</button>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail3">ALT imatge 2:</label>
                                                    <input name="alt_foto2" type="text" class="form-control @error('alt_foto2') is-invalid @enderror" id="exampleInputEmail3" placeholder="ALT imatge 2" value="{{ old('alt_foto2') }}">
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
    <script src="{{ asset('backend/js/select2.min.js') }}"></script>
    <script src="{{ asset('backend/js/select2.js') }}"></script>
@endsection

@endsection