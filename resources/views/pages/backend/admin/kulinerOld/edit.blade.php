@extends('layouts.backend.master')

@section('title','Edit Kuliner — Taman Kenangan')
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
                        <h5>Edit Kuliner</h5>
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
                        <form class="row" method="POST" action="{{route('articles.update', $item->id)}}"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="judul">Judul: <span class="text-danger">*</span></label>
                                    <input class="form-control" id="judul" name="judul" value="{{$item->judul}}"
                                        type="text" required="">
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                                <div class="form-group">
                                    <label for="customFile">Thumbnail: <span class="text-danger">*</span></label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="thumbnail" id="customFile">
                                        <label class="custom-file-label" for="customFile">Pilih file thumbnail</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="hidden" name="kategori" value="Artikel">
                                    <input class="form-control" type="hidden" name="author"
                                        value="{{Auth::user()->name}}">
                                    <input class="form-control" type="hidden" name="tanggal"
                                        value="{{{now()->toDateString()}}}">
                                </div>
                                <div class="email-wrapper">
                                    <div class="theme-form">
                                        <div class="form-group">
                                            <label>Content: <span class="text-danger">*</span></label>
                                            <textarea id="text-box" name="content" cols="10" rows="2">
                                                {!!htmlspecialchars_decode($item->content)!!}
                                            </textarea>
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
@endpush

@endsection
