@extends('layouts.frontend.master')

@section('content')
    <div class="wrapper">
        <!-- ==========================
                      contact layout 1
                  =========================== -->
        <section class="contact-layout1 pb-90">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="contact-panel p-0 box-shadow-none">
                            <div class="contact__panel-info">
                                <img src="{{ url('images/splide/booking.png') }}" 
                                style="border-radius:8px;">
                            </div><!-- /.contact__panel-info -->
                            
                                <form method="POST" action="{{ route('booking.store') }}" class="contact__panel-form mb-30" enctype="multipart/form-data">

                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        @if(session('error'))
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                {{ session('error') }}
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                        @endif
                                        @if(session('success'))
                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                {{ session('success') }}
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                        @endif
                                    </div>
                                    <!-- Hidden input for id_user -->
                                    <input type="hidden" id="id_user" name="id_user" value="{{ auth()->user()->id }}">
                                    
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Nama Kegiatan" id="nama_kegiatan" name="nama_kegiatan" required>
                                        </div>
                                    </div><!-- /.col-lg-6 -->
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <input type="date" class="form-control" placeholder="Tanggal Booking" id="tanggal_booking" name="tanggal_booking" required>
                                        </div>
                                    </div><!-- /.col-lg-6 -->
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <p class="ml-4 text-dark" >Waktu mulai</p>
                                            <input type="time" class="form-control" placeholder="Waktu Mulai" id="waktu_mulai" name="waktu_mulai" required>
                                        </div>
                                    </div><!-- /.col-lg-6 -->
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <p class="ml-4 text-dark">Waktu selesai</p>
                                            <input type="time" class="form-control" placeholder="Waktu Selesai" id="waktu_selesai" name="waktu_selesai" required>
                                        </div>
                                    </div><!-- /.col-lg-6 -->
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group">
                                            <label for="id_kategori_booking">Kategori<span class="text-danger">*</span></label>
                                            <select name="id_kategori_booking" id="id_kategori_booking" class="form-control" required>
                                                @foreach ($kategori_bookings as $kategori_booking)
                                                    <option value="{{ $kategori_booking->id }}">
                                                        {{ $kategori_booking->nama }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div><!-- /.col-lg-12 -->
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group">
                                            <textarea class="form-control" placeholder="Keterangan" id="keterangan" name="keterangan" required></textarea>
                                        </div>
                                    </div><!-- /.col-lg-12 -->
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <button type="submit" class="btn btn-success m-r-15" type="submit">Kirim</button>
                                    </div><!-- /.col-lg-12 -->
                                </div><!-- /.row -->    
                            </form>
                                                     
                            
                        </div><!-- /.contact__panel -->
                    </div><!-- /.col-lg-12 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.contact layout 1 -->
    </div>
@endsection


