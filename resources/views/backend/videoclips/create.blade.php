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
                            <h2>Inserir nou Videoclip</h2>
                            <p> * Camps obligatoris </p>
                            <br>
                            <form class="forms-sample" method="POST" action="{{ route('backend.videoclips.store') }}" enctype="multipart/form-data" novalidate>
                                @csrf
                                @error('titol')
                                    <div class='alert alert-danger' role='alert'>
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                                @error('artistes_id')
                                    <div class='alert alert-danger' role='alert'>
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                                @error('embed_youtube')
                                    <div class='alert alert-danger' role='alert'>
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror

                                <div class="form-group">
                                    <label for="exampleInputEmail3">Títol *:</label>
                                    <input name="titol" type="text" class="form-control @error('titol') is-invalid @enderror" id="exampleInputEmail3" placeholder="Títol" value="{{ old('titol') }}">
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
                                @php 
                                    $numbers = array(1, 2, 3, 4);
                                    $availables = array_diff($numbers, $videoclipsPortada);
                                @endphp
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Portada *:</label>
                                    <select id="portada" name="portada" class="form-control js-example-basic-single w-100">
                                        <option value=0>No</option>
                                        @foreach ($availables as $available)
                                            <option 
                                                value="{{ $available }}"
                                                {{ old('portada') == $available ? 'selected' : '' }}
                                            >
                                                Si - {{ $available }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3"><i class="mdi mdi-youtube"></i> Link Youtube * (Ex: https://www.youtube.com/watch?v=MN81eEaIrmo):</label>
                                    <input name="embed_youtube" type="text" class="form-control" id="exampleInputEmail3" placeholder="Link Youtube *" value="{{ old('embed_youtube') }}">
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