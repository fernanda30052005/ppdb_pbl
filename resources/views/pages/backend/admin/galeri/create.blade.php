@extends('layouts.backend.master')

@section('title', 'Tambah Data Galeri — Taman Kenangan')
@section('content')

<!-- file wrapper for better tabs start-->
<div>
    <!-- pages title header start-->
    <!-- pages title header end-->
    <!-- main content start-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Upload Foto Galeri</h5>
                    </div>
                    <form method="POST" action="{{route('admin.galeri.store')}}" enctype="multipart/form-data"
                        class="needs-validation" novalidate="">
                        @csrf
                        <div class="card-body">

                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <div class="form-row mb-3">
                                <div class="col-12 alert alert-danger py-1" role="alert">
                                    ⚠ • Maximal file yang dapat diupload adalab 5MB dan hanya menerima file
                                    gambar/images
                                </div>
                            </div>
                            <div class="form-row">
                                {{-- upload foto --}}
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="file" name="foto" class="custom-file-input" id="foto"
                                            aria-describedby="inputGroupFileAddon01" accept="image/*">>
                                        <label class="custom-file-label" for="inputGroupFile01">Pilih file gambar </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary m-r-15" type="submit">Upload</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- main content end-->
</div>
<!-- file wrapper for better tabs start-->
@push('ckeditor-scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var customFileInput = document.getElementById('foto');
        var customFileLabel = document.querySelector('label[for="inputGroupFile01"]');

        customFileInput.addEventListener('change', function () {
            var fileName = customFileInput.files[0].name;
            customFileLabel.innerHTML = fileName;
        });
    });
</script>
@endpush
@endsection
