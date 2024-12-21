@extends('layouts.backend.master')

@section('title','Edit Outlet — Taman Kenangan')
@section('content')

@push('dropzone-and-select-styles')
<link rel="stylesheet" type="text/css" href="{{url('cuba/assets/css/vendors/select2.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('cuba/assets/css/vendors/dropzone.css')}}">
@endpush

<!-- file wrapper for better tabs start-->
<div>
    <!-- main content start-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 pt-4">
                <div class="card">
                    <div class="card-header">
                        <h5>Edit Outlet</h5>
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
                        <form class="row" method="POST" action="{{route('umkm.outlet.update', $item->id)}}"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nama">Nama: <span class="text-danger">*</span></label>
                                            <input class="form-control" id="nama" name="nama" value="{{$item->nama}}" type="text" required="">
                                            <div class="valid-feedback">Looks good!</div>
                                        </div>
                                        <div class="form-group">
                                            <label for="deskripsi">Deskripsi: <span class="text-danger">*</span></label>
                                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" required="">{{ $item->deskripsi }}</textarea>
                                            <div class="valid-feedback">Looks good!</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Foto: <span class="text-danger">*</span></label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="foto" id="customFile">
                                                <label class="custom-file-label" for="customFile">Pilih file foto</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="kontak">Kontak: <span class="text-danger">*</span></label>
                                            <input class="form-control" id="kontak" name="kontak" value="{{$item->kontak}}" type="text" required="">
                                            <div class="valid-feedback">Looks good!</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-sm-12">
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
