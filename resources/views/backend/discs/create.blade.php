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
                            <h2>Inserir nou Single, EP, Àlbum o Pack</h2>
                            <p> * Camps obligatoris </p>
                            <br>
                            <form class="forms-sample" method="POST" action="{{ route('backend.discs.store') }}" enctype="multipart/form-data" novalidate>
                                @csrf
                                @error('titol')
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
                                @error('data_publicacio')
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
                                    <label for="exampleInputEmail3">Títol *:</label>
                                    <input name="titol" type="text" class="form-control @error('titol') is-invalid @enderror" id="exampleInputEmail3" placeholder="Títol" value="{{ old('titol') }}">
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
                                    <label for="exampleInputEmail3">Data de publicació *:</label>
                                    <input name="data_publicacio" id="data_publicacio" type="date" class="form-control @error('data_publicacio') is-invalid @enderror" id="exampleInputEmail3" value="{{ old('data_publicacio') }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Tipus *:</label>
                                    <select id="tipus_id" name="tipus_id" class="form-control js-example-basic-single w-100">
                                        @foreach ($tipus as $tipu)
                                            <option 
                                                value="{{ $tipu->id }}"
                                                {{ old('tipus_id') == $tipu->id ? 'selected' : '' }}
                                            >
                                                {{ $tipu->nom_cat }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Gènere *:</label>
                                    <select id="generes_id" name="generes_id" class="form-control js-example-basic-single w-100">
                                        @foreach ($generes as $genere)
                                            <option 
                                                value="{{ $genere->id }}"
                                                {{ old('generes_id') == $genere->id ? 'selected' : '' }}
                                            >
                                                {{ $genere->nom_cat }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Artista *:</label>
                                    <select id="artistes_id" name="artistes_id" class="form-control js-example-basic-single w-100">
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
                                <div class="form-group">
                                    <label for="exampleInputEmail3"><i class="mdi mdi-spotify"></i> Embed Spotify:</label>
                                    <input name="embed_spotify" type="text" class="form-control" id="exampleInputEmail3" placeholder="Embed Spotify" value="{{ old('embed_spotify') }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3"><i class="mdi mdi-spotify"></i> Link Spotify:</label>
                                    <input name="link_spotify" type="text" class="form-control" id="exampleInputEmail3" placeholder="Link Spotify" value="{{ old('link_spotify') }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3"><i class="mdi mdi-apple"></i> Link Apple Music:</label>
                                    <input name="link_apple_music" type="text" class="form-control" id="exampleInputEmail3" placeholder="Link Apple Music" value="{{ old('link_apple_music') }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3"><i class="mdi mdi-shopping"></i> URL venda física:</label>
                                    <input name="link_venda_fisica" type="text" class="form-control" id="exampleInputEmail3" placeholder="URL venda física" value="{{ old('link_venda_fisica') }}">
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
                                                        <label>Imatge Single, EP, Àlbum o Pack</label>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js" integrity="sha512-wEfICgx3CX6pCmTy6go+PmYVKDdi4KHhKKz5Xx/boKOZOtG7+rrm2fP7RUR2o4m/EbPdwbKWnP05dvj4uzoclA==" crossorigin="anonymous" defer></script>
    <script src="{{ asset('backend/js/file-upload.js') }}"></script>
    <script src="{{ asset('backend/js/select2.min.js') }}"></script>
    <script src="{{ asset('backend/js/select2.js') }}"></script>
@endsection

@endsection