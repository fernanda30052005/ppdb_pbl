@extends('layouts.backend.master')

@section('title', 'Upload Berita — Taman Kenangan')
@section('content')
 
@push('create-article-styles')
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
                        <h5>Upload Berita</h5>
                    </div>
                    <div class="card-body add-post">
                        <form class="row needs-validation" method="POST" action="{{route('admin.berita.store')}}"
                            enctype="multipart/form-data" novalidate="">
                            @csrf
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="judul">Judul: <span class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-news" width="20" height="20"
                                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path
                                                        d="M16 6h3a1 1 0 0 1 1 1v11a2 2 0 0 1 -4 0v-13a1 1 0 0 0 -1 -1h-10a1 1 0 0 0 -1 1v12a3 3 0 0 0 3 3h11">
                                                    </path>
                                                    <line x1="8" y1="8" x2="12" y2="8"></line>
                                                    <line x1="8" y1="12" x2="12" y2="12"></line>
                                                    <line x1="8" y1="16" x2="12" y2="16"></line>
                                                </svg></span>
                                        </div>
                                        <input class="form-control" id="judul" name="judul" value="{{old('judul')}}"
                                            type="text" required="">
                                        <div class="valid-feedback">Looks good!</div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="">Thumbnail: <span class="text-danger">*</span></label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="thumbnail" id="customFile">
                                        <label class="custom-file-label" for="customFile">Pilih file thumbnail</label>
                                    </div>
                                </div>
                                
                                
                                <div class="form-group">
                                    {{-- <input class="form-control" type="hidden" name="kategori" value="Artikel"> --}}
                                    <input class="form-control" type="hidden" name="penulis"
                                        value="{{Auth::user()->name}}">
                                    <input class="form-control" type="hidden" name="tanggal"
                                        value="{{{now()->toDateString()}}}">
                                </div>
                                <div class="email-wrapper">
                                    <div class="theme-form">
                                        <div class="form-group">
                                            <label>Konten: <span class="text-danger">*</span></label>
                                            <textarea id="text-box" name="konten" cols="10" rows="2"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="btn-showcase">
                                    <button class="btn btn-primary" type="submit">Upload</button>
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
