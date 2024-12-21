@extends('layouts.backend.master')

@section('title','Edit slide — Taman Kenangan')
@section('content')

@push('dropzone-and-select-styles')
<link rel="stylesheet" type="text/css" href="{{url('cuba/assets/css/vendors/select2.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('cuba/assets/css/vendors/dropzone.css')}}">
@endpush

<!-- file wrapper for better tabs start-->
<div>
    <!-- pages title header end-->
    <!-- main content start-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 pt-4">
                <div class="card">
                    <div class="card-header">
                        <h5>Edit Artikel</h5>
                    </div>
                    <div class="card-body add-post">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <form method="POST" action="{{ route('admin.slide.update', $item->id) }}" enctype="multipart/form-data" class="needs-validation">
                            @method('PUT')
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
                                        <label>Title<span class="text-danger">*</span></label>
                                        <div class="input-group mb-3">
                                            <input id="title" type="text" class="form-control" name="title" value="{{ $item->title }}" required>
                                            <div class="valid-feedback">Looks good!</div>
                                        </div>
                                    </div>
                        
                                    <div class="form-group col-md-6 mb-2">
                                        <label>Subtitle <span class="text-danger">*</span></label>
                                        <div class="input-group mb-3">
                                            <input id="subtitle" type="text" class="form-control" name="subtitle" value="{{ $item->subtitle }}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6 mb-2">
                                        <label for="">Deskripsi<span class="text-danger">*</span></label>
                                        <div class="input-group mb-3">
                                            <input required id="description" type="text" class="form-control" name="description" value="{{ $item->description }}">
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
                                <div class="btn-showcase">
                                    <button class="btn btn-primary" type="submit">Edit</button>
                                    <input class="btn btn-light" type="reset" value="Reset">
                                </div>
                            </div>
                        </form>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- main content end-->
</div>
<!-- file wrapper for better tabs start-->

@push('ckeditor-scripts')
<script src="{{url('cuba/assets/js/editor/ckeditor/ckeditor.js')}}"></script>
<script src="{{url('cuba/assets/js/editor/ckeditor/adapters/jquery.js')}}"></script>
<script src="{{url('cuba/assets/js/dropzone/dropzone.js')}}"></script>
<script src="{{url('cuba/assets/js/dropzone/dropzone-script.js')}}"></script>
<script src="{{url('cuba/assets/js/select2/select2.full.min.js')}}"></script>
<script src="{{url('cuba/assets/js/select2/select2-custom.js')}}"></script>
<script src="{{url('cuba/assets/js/email-app.js')}}"></script>
<script src="{{url('cuba/assets/js/form-validation-custom.js')}}"></script>
<script src="{{url('cuba/assets/js/tooltip-init.js')}}"></script>
@endpush

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
@endsection
