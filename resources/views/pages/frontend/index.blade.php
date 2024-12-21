@extends('layouts.frontend.master')

@section('content')

<div class="wrapper">
    
    <!-- Slider -->
    <section class="slider">
        <div class="slick-carousel carousel-arrows-light carousel-dots-light m-slides-0"
            data-slick='{"slidesToShow": 1, "arrows": true, "dots": true, "speed": 700,"fade": true,"cssEase": "linear"}'>

  
        </div><!-- /.slick-carousel -->
    </section><!-- /.slider -->

    </div><!-- /.wrapper -->

        <!-- ========================
                                                                                                                                                About Layout 1
                                                                                                                                              =========================== -->
        <section class="about-layout1 pt-130 pb-130">
            <div class="container">
                <h1 style="text-align: center">pondok pesantren hidayatul ma'arifiyah</h1>
                <p style="text-align: center">Pondok Pesantren Hidayatul Ma’arifiyah pada tahun
                                    1991 ditanah milik pribadi Buya Abdul karim. Melihat pengaruh globalisasi yang
                                    masuk kesegala sektor kehidupan yang tidak sesuai dengan ajaran Islam. Buya Abdul
                                    Karim sebagai pendiri dan pengasuh Pondok Pesantren segera melakukan
                                    pembangunan-pembangunan terutama sekali dalam bidang p endidikan, dengan
                                    mendirikan tiga jenjang pendidikan Pondok Pesantren Hidayatul Ma’arifiyah yaitu a.
                                    Formal, yang meliputi Madrasah Tsanawiyah ( MTS ), Madrasah Aliyah ( MA ) dan
                                    Sekolah Menengah Kejuruan ( SMK )</p>
            </div>
        </section>

        <!-- ======================
                                                                                                                                              services Layout 2
                                                                                                                                              ========================= -->
        <section class="services-layout2 pt-120">
            
            </div><!-- /.container -->
            <div class="bg-img"><img src="{{ url('solatec/assets/images/backgrounds/5.jpg') }}" alt="background"></div>

            <div class="container">
                <div class="row">
                  <div class="col-md">
                    <div class="col-sm-12 ">
                    </div><!-- /col-lg-5 -->
                  </div>
                          
                </div>
                              <!-- Hasil Pencarian -->
                              <div id="search-results" class="row">
                                @if(isset($search_success) && $search_success->isNotEmpty())
                                    <div class="col-12 ">
                                        <div class="slick-carousel carousel-arrows-light"
                                             data-slick='{"slidesToShow": 5, "slidesToScroll": 5, "arrows": true, "dots": true, "responsive": [ {"breakpoint": 992, "settings": {"slidesToShow": 2, "slidesToScroll": 2}}, {"breakpoint": 767, "settings": {"slidesToShow": 1, "slidesToScroll": 1}}]}'>
                                            @foreach($search_success as $kuliner)
                                                <!-- service item -->
                                                <a href="{{ route('kuliner.show', $kuliner->id) }}" class="service-item">
                                                    <div class="service__img">
                                                        <img src="{{ asset('storage/images/' . $kuliner->foto) }}" alt="service" loading="lazy">
                                                    </div><!-- /.service__img -->
                                                    <div class="service__body">
                                                        <h5 class="service__title">{{ $kuliner->nama }}</h5>
                                                        <p class="text-secondary">{{ $kuliner->kategori_kuliner->nama }}</p>
                                                        <p class="text-dark">Harga: Rp {{ number_format($kuliner->harga, 0, ',', '.') }}</p>
                                                    </div><!-- /.service__body -->
                                                </a><!-- /.service-item -->

                                            @endforeach

                                        </div><!-- /.carousel-->
                                    </div>
                                @else
                                <div class="col-lg-12 text-center mx-auto mt-3">
                                    <h1 class="mb-2">Alur Pendaftaran</h1>
                                    <p class="mb-4 text-white">
                                        <strong>1. Pilih jenjang dan jalur pendaftaran yang diinginkan</strong><br>
                                        <strong>2. Klik menu "Daftar" dan pilih "Pendaftaran Online"</strong><br>
                                        <strong>3. Isi formulir pendaftaran dengan lengkap (nomor peserta, asal sekolah, dll)</strong><br>
                                        <strong>4. Masukkan kode keamanan untuk validasi</strong><br>
                                        <strong>5. Upload dokumen persyaratan yang dibutuhkan</strong><br>
                                        <strong>6. Pilih sekolah tujuan pendaftaran</strong><br>
                                        <strong>7. Cetak bukti pendaftaran</strong><br>
                                        <strong>8. Ikuti proses seleksi sesuai jadwal</strong>
                                    </p>
                                </div>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-5">
                                    <p class="read-note__text">
                                        <strong class="color-white"> Pilih Kuliner untuk melihat deksripsi </strong>                    
                                    </p>
                                </div><!-- /.col-lg-5 -->
                            </div><!-- /.row -->
              </div>
            

        </section><!-- /.services Layout 2 -->

        

            </div>           


        <!-- ======================
                                                                                                                                                Blog Grid
                                                                                                                                              ========================= -->
        <section class="post-grid pb-60 bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-6 offset-lg-3">
                        <div class="heading text-center mb-50">
                            <h2 class="heading__subtitle">Pengumuman Kelulusan Pendaftaran</h2>
                            <h3 class="heading__title">Artikel Terbaru</h3>
                        </div><!-- /.heading -->
                    </div><!-- /.col-lg-6 -->
                </div><!-- /.row -->
                <div class="row">
                    @forelse ($beritas as $berita)
                        <!-- Post Item #1 -->
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="post-item">
                                <div class="post__img">
                                    <a href="blog-single-post.html">
                                        <img style=" width: 100%;
                                        height: 320px;
                                        object-fit: cover;"
                                            src="{{ url('storage/images/' . $berita->thumbnail) }}" alt="blog">
                                    </a>
                                    <span class="post__date">{{ $berita->tanggal }}</span>
                                </div><!-- /.post-img -->
                                <div class="post__body">
                                    <div class="post__meta d-flex align-items-center">
                                        <a class="post__author" href="#">{{ $berita->penulis}}</a>
                                    </div><!-- /.post-meta -->
                                    <h4 class="post__title"><a href="#">{{ $berita->judul }}
                                        </a></h4>
                                    <p class="post__desc">
                                        {{ substr(strip_tags(htmlspecialchars_decode($berita->konten)), 0, 100) }} ...</a>
                                    </p>
                                    <a href="{{ route('berita.show', $berita->id) }}"
                                        class="btn btn__secondary btn__outlined btn__custom">
                                        <i class="icon-arrow-right"></i>
                                        <span>Baca Selengkapnya</span>
                                    </a>
                                </div><!-- /.post-content -->
                            </div><!-- /.post-item -->
                        </div><!-- /.col-lg-4 -->
                    @empty
                        <div class="col-lg-12 text-center mx-auto mt-3">
                            <h1 class="mb-2">Tidak ada artikel yang ada disini</h1>
                            <p class="mb-4">Kami sedang menyiapkan artikel atau berita bagi anda.
                            </p>
                        </div>
                    @endforelse
                </div><!-- /.row -->
            </div><!-- /.container -->            
        </section><!-- /.blog Grid -->
    </div>
@endsection
