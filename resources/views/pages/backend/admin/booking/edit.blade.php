@extends('layouts.backend.master')

@section('title', 'Update Data Outlet — Zaqat')
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

    <div class="container-fluid pt-4">

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Update Data booking</h5>
                    </div>
                    <form method="POST" action="{{ route('admin.booking.update', $item->id) }}" enctype="multipart/form-data"
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
                                    <label for="">Nama Kegiatan<span
                                            class="text-danger">*</span></label>
                                    <div class="input-group mb-3">  
                                        <input id="nama_kegiatan" type="text" class="form-control"
                                            value="{{ $item->nama_kegiatan }}" name="nama_kegiatan" required>
                                    </div>
                                </div>

                                <div class="form-group col-md-6 mb-2">
                                    <label for="">Tanggal <span class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        <input id="tanggal_booking" type="date" class="form-control"
                                            value="{{ $item->tanggal_booking }}" name="tanggal_booking" required>
                                    </div>
                                </div>                
                                <div class="form-group col-md-6 mb-2">
                                    <label for="">Waktu Mulai <span class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        <input id="waktu_mulai" type="time" class="form-control"
                                            value="{{ $item->waktu_mulai }}" name="waktu_mulai" required>
                                    </div>
                                </div>                
                                <div class="form-group col-md-6 mb-2">
                                    <label for="">Waktu Selesai <span class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        <input id="waktu_selesai" type="time" class="form-control"
                                            value="{{ $item->waktu_selesai }}" name="waktu_selesai" required>
                                    </div>
                                </div>                
      
                                <div class="form-group col-md-4 mb-2">
                                    <label for="keterangan">Keterangan <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="keterangan" name="keterangan" rows="4" required="">{{ $item->keterangan }}</textarea>
                                    <div class="valid-feedback">Looks good!</div>
                                </div> 
                                <div class="form-group col-md-4 mb-2">
                                    <label for="">Kategori<span class="text-danger">*</span></label>
                                    <div class="">
                                        <select class="js-example-basic-single" name="id_kategori_booking">
                                            <option value="" disabled>Pilih Kategori</option>
                                            @foreach ($kategori_bookings as $kategori_booking)
                                                <option value="{{ $kategori_booking->id }}" 
                                                    {{ old('id_kategori_booking', $item->id_kategori_booking) == $kategori_booking->id ? 'selected' : '' }}>
                                                    {{ $kategori_booking->nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>                                    
                                </div>  
                                <div class="form-group col-md-4 mb-2">
                                    <label for="">Status<span class="text-danger">*</span></label>
                                    <div class="">
                                        <select class="js-example-basic-single" name="status">
                                            <option value="pengajuan" {{ old('status', $item->status) == 'pengajuan' ? 'selected' : '' }}>pengajuan</option>
                                            <option value="diterima" {{ old('status', $item->status) == 'diterima' ? 'selected' : '' }}>diterima</option>
                                            <option value="ditolak" {{ old('status', $item->status) == 'ditolak' ? 'selected' : '' }}>ditolak</option>
                                        </select>
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

