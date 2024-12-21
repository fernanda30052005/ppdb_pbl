@extends('layouts.backend.master')

@section('title', 'Data Slide — Taman Kenangan')
@section('content')

    @push('timepicker-styles')
        <link rel="stylesheet" type="text/css" href="{{ url('cuba/assets/css/vendors/timepicker.css') }}">
    @endpush

    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12 pt-4">
                <div class="card">
                    <div class="card-header">
                        <h5>Data Slide</h5>
                    </div>
                    <form method="POST" action="{{ route('admin.slide.store') }}" enctype="multipart/form-data"
                        class="needs-validation">
                        @csrf
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        <li>
                                            <h4>Ada yang Error</h4>
                                        </li>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="form-row">
                                <div class="form-group col-md-6 mb-2">
                                    <label>Title<span
                                            class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        <input id="title" type="text" class="form-control"
                                            value="{{ old('title') }}" name="title" required>
                                    </div>
                                </div>

                                <div class="form-group col-md-6 mb-2">
                                    <label>Subtitle <span class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        <input id="subtitle" type="subtitle" class="form-control"
                                            value="{{ old('subtitle') }}" name="subtitle" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">                                                              

                                <div class="form-group col-md-6 mb-2">
                                    <label for="">Description<span class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        <input required id="description" type="text" value="{{ old('description') }}"
                                            class="form-control" name="description">
                                    </div>
                                </div>                                  

                                <div class="form-group col-md-6 mb-2">
                                    <label for="">Image: <span class="text-danger">*</span></label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="image" id="customFile">
                                        <label class="custom-file-label" for="customFile">Pilih file image</label>
                                    </div>
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
