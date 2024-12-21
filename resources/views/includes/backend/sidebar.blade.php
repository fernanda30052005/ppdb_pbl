<div class="sidebar-wrapper h-100">
    <nav class="sidebar-main">
        <div id="sidebar-menu">
            <ul class="sidebar-links custom-scrollbar">
                <li class="back-btn">
                    <a href="#">
                        <img class="img-fluid" src="#" alt="">
                    </a>
                    <div class="mobile-back text-right">
                        <span>Back</span>
                        <i class="fa fa-angle-right pl-2" aria-hidden="true"></i>
                    </div>
                </li>
            
                <li class="sidebar-main-title pt-0">
                    <div>
                        <h6>Halaman Utama</h6>
                        <p>Dashboard & Overview</p>
                    </div>
                </li>
            
                @if(Auth::check())
                    @if(Auth::user()->role == 'admin')
                        <li class="sidebar-list">
                            <a class="sidebar-link sidebar-title link-nav" href="{{ url('admin/dashboard') }}">
                                <i data-feather="home"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
        
                        <li class="sidebar-main-title">
                            <div>
                                <h6>Master Data</h6>
                            </div>
                        </li>
        
                        <li class="sidebar-list">
                            <a class="sidebar-link sidebar-title">
                                <i data-feather="user-plus"></i>
                                <span>User </span>
                            </a>
                            <ul class="sidebar-submenu">
                                <li class="active">
                                    <a href="{{ url('/admin/user/') }}">
                                        List data 
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/admin/user/create') }}">
                                        Tambah Data 
                                    </a>
                                </li>
                            </ul>
                        </li>
        
                        <li class="sidebar-list">
                            <a class="sidebar-link sidebar-title">
                                <i data-feather="user-plus"></i>
                                <span>Umkm </span>
                            </a>
                            <ul class="sidebar-submenu">
                                <li class="active">
                                    <a href="{{ url('/admin/umkm/') }}">
                                        List data 
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/admin/umkm/create') }}">
                                        Tambah Data 
                                    </a>
                                </li>
                            </ul>
                        </li>
        
                        <li class="sidebar-list">
                            <a class="sidebar-link sidebar-title" href="#">
                                <i data-feather="user"></i>
                                <span>Admin</span>
                            </a>
                            <ul class="sidebar-submenu">
                                <li>
                                    <a href="{{ url('/admin/admin/') }}">
                                        List data 
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/admin/admin/create') }}">
                                        Tambah Data
                                    </a>
                                </li>
                            </ul>
                        </li>   
                        <li class="sidebar-list">
                            <a class="sidebar-link sidebar-title" href="#">
                                <i data-feather="grid"></i>
                                <span>Kategori Booking</span>
                            </a>
                            <ul class="sidebar-submenu">
                                <li>
                                    <a href="{{ url('/admin/kategori_booking') }}">
                                        List data
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/admin/kategori_booking/create') }}">
                                        Tambah Kategori Booking
                                    </a>
                                </li>
                            </ul>
                        </li>   

                        <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title" href="#">
                            <i data-feather="grid"></i>
                            <span>Kategori Kuliner</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li>
                                <a href="{{ url('/admin/kategori_kuliner') }}">
                                    Kategori
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/admin/kategori_kuliner/create') }}">
                                    Tambah Kategori
                                </a>
                            </li>
                        </ul>
                        </li> 
                        
                        <li class="sidebar-main-title">
                            <div>
                                <h6>Aplikasi</h6>
                            </div>
                        </li>

                        <li class="sidebar-list">
                            <a class="sidebar-link sidebar-title" href="#">
                                <i data-feather="image"></i>
                                <span>Booking</span>
                            </a>
                            <ul class="sidebar-submenu">
                                <li>
                                    <a href="{{ url('/admin/booking') }}">
                                        Pengajuan
                                    </a>
                                </li>                          
                                <li>
                                    <a href="{{ url('/admin/booking-all') }}">
                                        Semua Booking
                                    </a>
                                </li>                         
                                              
                            </ul>
                        </li>

                        <li class="sidebar-list">
                            <a class="sidebar-link sidebar-title" href="#">
                                <i data-feather="shopping-cart"></i>
                                <span>Outlet & Kuliner</span>
                            </a>
                            <ul class="sidebar-submenu">
                                <li>
                                    <a href="{{ url('/admin/outlet') }}">
                                        Outlet
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/admin/outlet/create') }}">
                                        Tambah Outlet
                                    </a>
                                </li>
                            </ul>
                            <ul class="sidebar-submenu">
                                <li>
                                    <a href="{{ url('/admin/kategori_kuliner') }}">
                                        Kategori
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/admin/kategori_kuliner/create') }}">
                                        Tambah Kategori
                                    </a>
                                </li>
                            </ul>
                        </li>          
        
                        <li class="sidebar-main-title">
                            <div>
                                <h6>Kelola Website</h6>
                            </div>
                        </li>        
        
                        <li class="sidebar-list">
                            <a class="sidebar-link sidebar-title">
                                <i data-feather="edit"></i>
                                <span>Berita</span>
                            </a>
                            <ul class="sidebar-submenu">
                                <li class="{{ request()->is('admin/berita') ? 'active' : '' }}">
                                    <a href="{{ url('/admin/berita') }}">
                                        Data Berita
                                    </a>
                                </li>
                                <li class="{{ request()->is('admin/berita/create') ? 'active' : '' }}">
                                    <a href="{{ url('/admin/berita/create') }}">
                                        Tambah Data
                                    </a>
                                </li>
                            </ul>
                        </li>
        
                        <li class="sidebar-list">
                            <a class="sidebar-link sidebar-title" href="#">
                                <i data-feather="image"></i>
                                <span>Galeri</span>
                            </a>
                            <ul class="sidebar-submenu">
                                <li>
                                    <a href="{{ url('/admin/galeri') }}">
                                        Semua Galeri
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/admin/galeri/create') }}">
                                        Upload Foto Baru
                                    </a>
                                </li>
                            </ul>
                        </li>       

        
                        <li class="sidebar-list">
                            <a class="sidebar-link sidebar-title" href="#">
                                <i data-feather="sliders"></i>
                                <span>Slide</span>
                            </a>
                            <ul class="sidebar-submenu">
                                <li>
                                    <a href="{{ url('/admin/slide') }}">
                                        Slide
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/admin/slide/create') }}">
                                        Tambah Data
                                    </a>
                                </li>
                            </ul>
                        </li>
        
                        <li class="sidebar-main-title">
                            <div>
                                <h6>Laporan</h6>
                            </div>
                        </li>
        
                        <li class="sidebar-list">
                            <a class="sidebar-link sidebar-title link-nav" href="{{ url('/admin/laporan') }}">
                                <i data-feather="bar-chart"></i>
                                <span>Laporan </span>
                            </a>
                        </li>   
                        
                    @elseif(Auth::user()->role == 'umkm')
                        <!-- Menu untuk UMKM -->
                        <li class="sidebar-list">
                            <a class="sidebar-link sidebar-title link-nav" href="{{ url('umkm/dashboard') }}">
                                <i data-feather="home"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
            
                        <li class="sidebar-main-title">
                            <div>
                                <h6>{{ Auth::user()->outlet->nama }}</h6>
                                <p>Preferensi</p>
                            </div>
                        </li>
            
                        <li class="sidebar-list">

                            <a class="sidebar-link sidebar-title" href="#">
                                <i data-feather="coffee"></i> <!-- Ikon kopi -->
                                <span>Kuliner</span>
                            </a>
                            <ul class="sidebar-submenu">
                                <li>
                                    <a href="{{ url('/umkm/kuliner') }}">
                                        Master Data 
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/umkm/kuliner/create') }}">
                                        Tambah Data
                                    </a>
                                </li>
                            </ul>
                            <a class="sidebar-link sidebar-title" href="#">
                                <i data-feather="settings"></i>
                                <span>Preferensi</span>
                            </a>
                            <ul class="sidebar-submenu">
                                <li>
                                    <a href="{{ url('/umkm/outlet') }}">
                                        Outlet
                                    </a>
                                </li>
                            </ul>
                            
                        </li>                        
                        
                    @endif
                @endif
            
            </ul>
            
        </div>
        <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
    </nav>
</div>


