@extends('layouts.backend.master')

@section('title', 'Update Data Umkm — Taman Kenangan')
@section('content')

    @push('timepicker-styles')
        <link rel="stylesheet" type="text/css" href="{{ url('cuba/assets/css/vendors/timepicker.css') }}">
    @endpush

    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12 pt-4">
                <div class="card">
                    <div class="card-header">
                        <h5>Update Data Umkm</h5>
                    </div>
                    <form method="POST" action="{{ route('admin.umkm.update', $item->id) }}" enctype="multipart/form-data"
                        class="needs-validation">
                        @method('PUT')
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
                                <div class="form-group col-md-6 mb-2">
                                    <label for="">Nama<span
                                            class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        <input id="name" type="text" class="form-control"
                                            value="{{ $item->name }}" name="name" required>
                                    </div>
                                </div>

                                <div class="form-group col-md-6 mb-2">
                                    <label for="">Email <span class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        <input id="email" type="email" class="form-control"
                                            value="{{ $item->email }}" name="email" required>
                                    </div>
                                </div>
                                <div class="form-group col-md-6 mb-2">
                                    <label for="">Password <span class="text-success">(optional)</span></label>
                                    <div class="input-group mb-3">
                                        <input id="password" type="password" class="form-control"
                                            value="" name="password">
                                    </div>
                                </div>
                                <div class="form-group col-md-6 mb-2">
                                    <label for="">No. Handphone <span class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        <input id="no_hp" type="text" class="form-control"
                                            value="{{ $item->no_hp }}" name="no_hp" required>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary m-r-15" type="submit">Update</button>
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
    @endpush

@endsection
