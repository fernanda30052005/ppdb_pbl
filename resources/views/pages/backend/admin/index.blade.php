@extends('layouts.backend.master')

@section('title', 'Selamat datang di Dashboard Taman Kenangan ' . Auth::user()->name . '!')
@section('content')

    @push('datatable-styles')
        <link rel="stylesheet" type="text/css" href="{{ url('cuba/assets/css/vendors/scrollable.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('cuba/assets/css/vendors/datatables.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('cuba/assets/css/vendors/datatable-extension.css') }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.3.1/dist/css/splide.min.css">
    @endpush

    <div>
        <div class="container-fluid">
            <div class="row" style="margin-top:14vh">

        <!-- pages title header start-->
        <div class="container-fluid">
            <div class="row" style="margin-top:14vh">
                <div class="col-sm-6 col-xl-3 col-lg-6">
                    <a href="/admin/booking" class="card-link">
                        <div class="card o-hidden">
                            <div class="bg-warning b-r-4 card-body">
                                <div class="media static-top-widget">
                                    <div class="align-self-center text-center">
                                        <i data-feather="clock" class="text-white"></i>
                                    </div>
                                    <div class="media-body">
                                        <span class="m-0 text-white">Menunggu</span>
                                        <h4 class="mb-0 counter text-white">
                                            {{ DB::table('bookings')->where('status', 'pengajuan')->count() }}
                                        </h4>
                                        <i class="icon-bg" data-feather="clock" class="text-white"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                

                <div class="col-sm-6 col-xl-3 col-lg-6">
                    <a href="/admin/user" class="card-link">
                    <div class="card o-hidden">
                        <div class="bg-primary b-r-4 card-body">
                            <div class="media static-top-widget">
                                <div class="align-self-center text-center"><i data-feather="user-plus"></i></div>
                                <div class="media-body"><span class="m-0">Total Users</span>
                                    <h4 class="mb-0 counter">{{ DB::table('users')->where('role', 'user')->count() }}</h4><i class="icon-bg"
                                        data-feather="user-plus"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    </a>
                </div>

                <div class="col-sm-6 col-xl-3 col-lg-6">
                    <a href="/admin/umkm" class="card-link">
                    <div class="card o-hidden">
                        <div class="bg-primary b-r-4 card-body">
                            <div class="media static-top-widget">
                                <div class="align-self-center text-center"><i data-feather="user-plus"></i></div>
                                <div class="media-body"><span class="m-0">Total UMKM</span>
                                    <h4 class="mb-0 counter">{{ DB::table('users')->where('role', 'umkm')->count() }}</h4><i class="icon-bg"
                                        data-feather="user-plus"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    </a>

                </div>

                <div class="col-sm-6 col-xl-3 col-lg-6">
                    <a href="{{ url('/') }}" class="card-link">
                        <div class="card o-hidden">
                            <div class="bg-primary b-r-4 card-body">
                                <div class="media static-top-widget">
                                    <div class="align-self-center text-center">
                                        <i data-feather="home"></i> <!-- Ikon Feather Home -->
                                    </div>
                                    <div class="media-body">
                                        <span class="m-0"> Halaman</span>
                                        <h4 class="mb-0 counter">Beranda</h4>
                                        <i class="icon-bg"
                                        data-feather="home"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-xl-12 col-12 mt-4">
                    <div class="splide"
                        style="box-shadow:rgba(0, 0, 0, 0.05) 0px 0px 4px 0px, rgba(0, 0, 0, 0.1) 0px 4px 24px 0px; border-radius:8px;">
                        <div class="splide__track">
                            <ul class="splide__list">
                                <li class="splide__slide">
                                    <img src="{{ url('images/splide/selamatdatang.png') }}" class="d-block w-100"
                                        style="border-radius:8px;">
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
            </div>
        </div>
    </div>

    @push('datatable-scripts')
        <script src="{{ url('cuba/assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ url('cuba/assets/js/datatable/datatable-extension/dataTables.buttons.min.js') }}"></script>
        <script src="{{ url('cuba/assets/js/datatable/datatable-extension/jszip.min.js') }}"></script>
        <script src="{{ url('cuba/assets/js/datatable/datatable-extension/buttons.colVis.min.js') }}"></script>
        <script src="{{ url('cuba/assets/js/datatable/datatable-extension/pdfmake.min.js') }}"></script>
        <script src="{{ url('cuba/assets/js/datatable/datatable-extension/vfs_fonts.js') }}"></script>
        <script src="{{ url('cuba/assets/js/datatable/datatable-extension/dataTables.autoFill.min.js') }}"></script>
        <script src="{{ url('cuba/assets/js/datatable/datatable-extension/dataTables.select.min.js') }}"></script>
        <script src="{{ url('cuba/assets/js/datatable/datatable-extension/buttons.bootstrap4.min.js') }}"></script>
        <script src="{{ url('cuba/assets/js/datatable/datatable-extension/buttons.html5.min.js') }}"></script>
        <script src="{{ url('cuba/assets/js/datatable/datatable-extension/buttons.print.min.js') }}"></script>
        <script src="{{ url('cuba/assets/js/datatable/datatable-extension/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ url('cuba/assets/js/datatable/datatable-extension/dataTables.responsive.min.js') }}"></script>
        <script src="{{ url('cuba/assets/js/datatable/datatable-extension/responsive.bootstrap4.min.js') }}"></script>
        <script src="{{ url('cuba/assets/js/datatable/datatable-extension/dataTables.keyTable.min.js') }}"></script>
        <script src="{{ url('cuba/assets/js/datatable/datatable-extension/dataTables.colReorder.min.js') }}"></script>
        <script src="{{ url('cuba/assets/js/datatable/datatable-extension/dataTables.fixedHeader.min.js') }}"></script>
        <script src="{{ url('cuba/assets/js/datatable/datatable-extension/dataTables.rowReorder.min.js') }}"></script>
        <script src="{{ url('cuba/assets/js/datatable/datatable-extension/dataTables.scroller.min.js') }}"></script>
        <script src="{{ url('cuba/assets/js/datatable/datatable-extension/custom.js') }}"></script>
        <script src="{{ url('cuba/assets/js/tooltip-init.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.3.1/dist/js/splide.min.js"></script>
        <script>
            new Splide('.splide', {
                autoplay: 'playing',
                rewind: true,
                arrows: false,
                interval: 1600,
            }).mount();
        </script>
    @endpush

@endsection
