@extends('layouts.backend.master')

@section('title', 'Tambah Data Kuliner — Taman Kenangan')
@section('content')

    @push('timepicker-styles')
        <link rel="stylesheet" type="text/css" href="{{ url('cuba/assets/css/vendors/timepicker.css') }}">
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <style>
            span.select2.select2-container.select2-container--classic {
                width: 100% !important;
            }

            .select2-container .select2-selection--single {
                border-color: #495057 !important;
            }
        </style>
    @endpush

    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12 pt-4i">
                <div class="card">
                    <div class="card-header">
                        <h5>Tambah Data Kuliner</h5>
                    </div>
                    <form method="POST" action="{{ route('umkm.kuliner.store') }}" enctype="multipart/form-data"
                        class="needs-validation">
                        @csrf
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        <li>
                                            <h4>Ada error</h4>
                                        </li>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="form-row">
                                <div class="form-group col-md-4 mb-2">
                                    <label>Nama<span
                                            class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        <input id="nama" type="text" class="form-control"
                                            value="{{ old('nama') }}" name="nama" required>
                                    </div>
                                </div>

                                <input class="form-control" type="hidden" name="id_user"
                                value="{{Auth::user()->name}}">

                                <div class="form-group col-md-4 mb-2">
                                    <label>Harga<span
                                            class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        <input id="harga" type="text" class="form-control"
                                            value="{{ old('harga') }}" name="harga" required>
                                    </div>
                                </div>

                                <div class="form-group col-md-4 mb-2">
                                    <label for="">Foto: <span class="text-danger">*</span></label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="foto" id="customFile">
                                        <label class="custom-file-label" for="customFile">Pilih file foto</label>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="form-row">
                                <div class="form-group col-6 mb-2">
                                    <label for="">Kategori<span class="text-danger">*</span></label>
                                    <div class="">
                                        <select class="js-example-basic-single" name="id_kategori_kuliner">
                                            <option></option>
                                            @foreach ($kategori_kuliners as $kategori_kuliner)
                                                <option value="{{ $kategori_kuliner->id }}">{{ $kategori_kuliner->nama }}</option>
                                            @endforeach                                            
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group col-md-6 mb-2">
                                    <label for="deskripsi">Deskripsi <span class="text-danger">*</span></label>
                                    <textarea id="deskripsi" class="form-control" name="deskripsi" rows="4" required>{{ old('deskripsi') }}</textarea>
                                </div>

                            </div>

                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary m-r-15" type="submit">Tambah</button>
                            <button class="btn btn-light" type="reset">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('timepicker-scripts')
        <script src="{{ url('cuba/assets/js/time-picker/jquery-clockpicker.min.js') }}"></script>
        <script src="{{ url('cuba/assets/js/time-picker/highlight.min.js') }}"></script>
        <script src="{{ url('cuba/assets/js/time-picker/clockpicker.js') }}"></script>


        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
            $(document).ready(function() {
                $('.js-example-basic-single').select2({
                    theme: "classic",
                    width: 'resolve', // need to override the changed default
                    placeholder: "Pilih Kategori",
                });
            });
        </script>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var customFileInput = document.getElementById('customFile');
                var customFileLabel = document.querySelector('label[for="customFile"]');

                customFileInput.addEventListener('change', function () {
                    var fileName = customFileInput.files[0].name;
                    customFileLabel.innerHTML = fileName;
                });
            });
        </script>
    @endpush

@endsection
