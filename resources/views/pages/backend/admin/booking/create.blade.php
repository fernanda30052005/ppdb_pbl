@extends('layouts.backend.master')

@section('title', 'Tambah Data booking — Taman Kenangan')
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
                        <h5>Tambah Data booking</h5>
                    </div>
                    <form method="POST" action="{{ route('admin.booking.store') }}" enctype="multipart/form-data"
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
                                    <label for="">User<span class="text-danger">*</span></label>
                                    <div class="">
                                        <select class="js-example-basic-single" name="id_user">
                                            <option></option>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach                                            
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group col-md-4 mb-2">
                                    <label>Nama Kegiatan<span
                                            class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        <input id="nama_kegiatan" type="text" class="form-control"
                                            value="{{ old('nama_kegiatan') }}" name="nama_kegiatan" required>
                                    </div>
                                </div>

                                <div class="form-group col-md-4 mb-2">
                                    <label for="">Kategori<span class="text-danger">*</span></label>
                                    <div class="">
                                        <select class="js-example-basic-single" name="id_kategori_booking">
                                            <option></option>
                                            @foreach ($kategori_bookings as $kategori_booking)
                                                <option value="{{ $kategori_booking->id }}">{{ $kategori_booking->nama }}</option>
                                            @endforeach                                            
                                        </select>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4 mb-2">
                                    <label>Mulai <span class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        <input id="waktu_mulai" type="date" class="form-control"
                                            value="{{ old('waktu_mulai') }}" name="waktu_mulai" required>
                                    </div>
                                </div>
                                <div class="form-group col-md-4 mb-2">
                                    <label>Selesai <span class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        <input id="waktu_selesai" type="date" class="form-control"
                                            value="{{ old('waktu_selesai') }}" name="waktu_selesai" required>
                                    </div>
                                </div>

                                <div class="form-group col-md-4 mb-2">
                                    <label for="keterangan">Keterangan <span class="text-danger">*</span></label>
                                    <textarea id="keterangan" class="form-control" name="keterangan" rows="4" required>{{ old('keterangan') }}</textarea>
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
                    placeholder: "Pilih",
                });
            });
        </script>

    @endpush

@endsection
