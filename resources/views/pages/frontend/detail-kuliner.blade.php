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
                                <li class="breadcrumb-item active" aria-current="page">kuliner {{ $item->nama }}</li>
                            </ol>
                        </nav>
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
                            <div class="container">
                                <div class="row">
                                  <div class="col-sm">
                                    <div class="post__img">
                                        <a href="#" class="text-center mx-auto">
                                            <img style=" width: 300px;
                                            height: auto;
                                            object-fit: cover;"
                                                src="{{ url('storage/images/' . $item->foto) }}" class="mx-auto"
                                                alt="post image">
                                        </a>
                                    </div><!-- /.entry-img -->
                                  </div>
                                  <div class="col-sm">
                                            <span class="post__author">Kategori : {{ $item->kategori_kuliner->nama }}</a></span>
                                        <h5 class=""> {{ $item->nama }}</h5>
                                        <div class="post__desc">
                                            <p>
                                                {!! htmlspecialchars_decode($item->deskripsi) !!}
                                            </p>
                                        </div><!-- /.post-desc -->
                                        <p class="text-dark" style="font-weight: bold">Harga: Rp {{ number_format($item->harga, 0, ',', '.') }}</p>
                                        <p>
                                            <a href="{{ route('outlet.show', $item->outlet->id) }}" style="color: blue;">
                                                <i class="fas fa-store"></i> <!-- Menggunakan ikon 'store' dari Font Awesome -->
                                                {{ $item->outlet->nama }}
                                            </a>
                                        </p>
                                        
                                        <p class="text-dark">Kontak: {{ $item->outlet->kontak}}</p>

                                    </div>
                                </div>
                              </div>
       
                        </div><!-- /.post-item -->
                    </div><!-- /.col-lg-8 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.blog Single -->
    </div>
@endsection
