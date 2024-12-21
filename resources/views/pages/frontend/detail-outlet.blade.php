@extends('layouts.frontend.master')

@section('content')
    <div class="wrapper">
        <!-- ========================
                                                                                                                   page title
                                                                                                                =========================== -->
        <section class="page-title pt-30 pb-30">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <nav>
                            <ol class="breadcrumb justify-content-center mb-20">
                                <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $item->nama }}</li>
                            </ol>
                        </nav>
                        <div class="row mb-20 text-dark">
                            <!-- Kolom Kiri: Outlet -->
                            <div class="col-md-6">
                                <p class="mb-0">Outlet: {{ $item->nama }}</p>
                            </div><!-- /.col-md-6 -->
                    
                            <!-- Kolom Kanan: Kontak -->
                                   <!-- Kolom Kanan: Kontak -->
                            <div class="col-md-6 d-flex justify-content-end">
                                <p class="mb-0">Kontak: {{ $item->kontak }}</p>
                            </div><!-- /.col-md-6 -->
                        </div><!-- /.row -->
                    </div><!-- /.col-xl-6 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.page-title -->

        <!-- ======================
                                                                                                                    Blog Single
                                                                                                                  ========================= -->
        <section class="blog blog-single pt-0 pb-40">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="post-item mb-0">
                            <div class="post__img">
                                <a href="#" class="text-center mx-auto">
                                    <img style=" width: 100%;
                                    height: 40vh;
                                    object-fit: cover;"
                                        src="{{ url('storage/images/' . $item->foto) }}" class="mx-auto"
                                        alt="post image">
                                </a>
                            </div><!-- /.entry-img -->
                            <div class="post__body">
                                <div class="post__desc">
                                    <p>
                                        {!! htmlspecialchars_decode($item->deskripsi) !!}
                                    </p>
                                </div><!-- /.post-desc -->
                                <h1 class="post__title">Kuliner Outlet</h1>
                                <div class="post__desc">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="slick-carousel carousel-arrows-light"
                                                data-slick='{"slidesToShow": 4, "slidesToScroll": 4, "arrows": true, "dots": true, "responsive": [ {"breakpoint": 992, "settings": {"slidesToShow": 2, "slidesToScroll": 2}}, {"breakpoint": 767, "settings": {"slidesToShow": 1, "slidesToScroll": 1}}]}'>
                                                @foreach($item->kuliner as $k)
                                                <!-- service item -->
                                                <div class="service-item">
                                                    <div class="service__img">
                                                        <img src="{{ url('storage/images/' . $k->foto) }}" alt="service" loading="lazy">
                    
                                                    </div><!-- /.service__img -->
                                                    <a href="{{ route('kuliner.show', $k->id) }}" class="service-item">
                                                    <div class="service__body">
                                                        <h5 class="service__title">{{ $k->nama }}</h5>
                                                        <p class="text-secondary">{{ $k->kategori_kuliner->nama }}</p>
                                                        <p class="text-dark">Harga: Rp {{ number_format($k->harga, 0, ',', '.') }}</p>
                                                    </div><!-- /.service__body -->
                                                    </a>
                                                </div><!-- /.service-item -->
                                                @endforeach
                                            </div><!-- /.carousel-->
                                        </div><!-- /.col-12 -->
                                    </div>
                                </div><!-- /.post-desc -->
                            </div><!-- /.entry-content -->
                        </div><!-- /.post-item -->
                    </div><!-- /.col-lg-8 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.blog Single -->
    </div>
@endsection
