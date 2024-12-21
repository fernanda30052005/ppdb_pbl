@extends('layouts.frontend.master')

@section('content')

fhfhh
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
                                            <input type="text" class="form-control" placeholder="Nama Lengkap" id="nama_lengkap" name="nama_lengkap" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Nama Panggilan" id="nama_panggilan" name="nama_panggilan" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Tempat Lahir" id="tempat_lahir" name="tempat_lahir" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <input type="date" class="form-control" placeholder="Tanggal Lahir" id="tanggal_lahir" name="tanggal_lahir" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                                                <option value="">Pilih Jenis Kelamin</option>
                                                <option value="L">Laki-laki</option>
                                                <option value="P">Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <input type="number" class="form-control" placeholder="Tinggi Badan (cm)" id="tinggi_badan" name="tinggi_badan" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <input type="number" class="form-control" placeholder="Berat Badan (kg)" id="berat_badan" name="berat_badan" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Golongan Darah" id="golongan_darah" name="golongan_darah">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group">
                                            <textarea class="form-control" placeholder="Riwayat Penyakit" id="riwayat_penyakit" name="riwayat_penyakit"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <input type="number" class="form-control" placeholder="Anak ke-" id="anak_ke" name="anak_ke" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <input type="number" class="form-control" placeholder="Jumlah Saudara" id="jumlah_saudara" name="jumlah_saudara" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group">
                                            <textarea class="form-control" placeholder="Prestasi Akademik" id="prestasi_akademik" name="prestasi_akademik"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group">
                                            <textarea class="form-control" placeholder="Prestasi Non Akademik" id="prestasi_non_akademik" name="prestasi_non_akademik"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group">
                                            <select class="form-control" id="jurusan" name="jurusan" required>
                                                <option value="">Pilih Jurusan</option>
                                                <option value="TKJ">TKJ</option>
                                                <option value="Akuntansi">Akuntansi</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group">
                                            <textarea class="form-control" placeholder="Alamat" id="alamat" name="alamat" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="No Telepon" id="no_telepon" name="no_telepon" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <select class="form-control" id="tinggal_dengan" name="tinggal_dengan" required>
                                                <option value="">Tinggal Dengan</option>
                                                <option value="orangtua">Orang Tua</option>
                                                <option value="saudara">Saudara</option>
                                                <option value="asrama">Asrama</option>
                                                <option value="kost">Kost</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Jarak ke Sekolah" id="jarak_ke_sekolah" name="jarak_ke_sekolah" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Sekolah Asal" id="sekolah_asal" name="sekolah_asal" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Nomor Ijazah" id="nomor_ijazah" name="nomor_ijazah">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <input type="date" class="form-control" placeholder="Tanggal Ijazah" id="tanggal_ijazah" name="tanggal_ijazah">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Nomor UN" id="nomor_un" name="nomor_un">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="NISN" id="nisn" name="nisn" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <input type="number" class="form-control" placeholder="Lama Belajar (tahun)" id="lama_belajar" name="lama_belajar" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Pindahan Dari" id="pindahan_dari" name="pindahan_dari">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group">
                                            <textarea class="form-control" placeholder="Alasan Pindah" id="alasan_pindah" name="alasan_pindah"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <input type="date" class="form-control" placeholder="Tanggal Diterima" id="tanggal_diterima" name="tanggal_diterima" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group">
                                            <textarea class="form-control" placeholder="Kegemaran Kesenian" id="kegemaran_kesenian" name="kegemaran_kesenian"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group">
                                            <textarea class="form-control" placeholder="Kegemaran Olahraga" id="kegemaran_olahraga" name="kegemaran_olahraga"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group">
                                            <textarea class="form-control" placeholder="Kegemaran Organisasi" id="kegemaran_organisasi" name="kegemaran_organisasi"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group">
                                            <textarea class="form-control" placeholder="Kegemaran Lainnya" id="kegemaran_lainnya" name="kegemaran_lainnya"></textarea>
                                        </div>
                                    </div>
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


