@extends('layouts.backend.master')

@section('title', 'Tambah Data Outlet — Taman Kenangan')
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
            <div class="col-sm-12 pt-4">
                <div class="card">
                    <div class="card-header">
                        <h5>Tambah Data Outlet</h5>
                    </div>
                    <form method="POST" action="{{ route('admin.outlet.store') }}" enctype="multipart/form-data"
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
                                <div class="form-group col-md-12 mb-2">
                                    <label>Nama Outlet<span
                                            class="text-danger">*</span></label>
                                    <div class="input-group mb-2">
                                        <input id="name" type="text" class="form-control"
                                            value="{{ old('nama') }}" name="nama" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-12 mb-2">
                                    <label for="">Owner<span class="text-danger">*</span></label>
                                    <div class="">
                                        <select class="js-example-basic-single" name="id_user">
                                            <option></option>
                                            @foreach ($items as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach                                            
                                        </select>
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


        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
            $(document).ready(function() {
                $('.js-example-basic-single').select2({
                    theme: "classic",
                    width: 'resolve', // need to override the changed default
                    placeholder: "Pilih UMKM yang terdaftar",
                });
            });
        </script>
    @endpush

@endsection
