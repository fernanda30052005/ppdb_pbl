  <!-- =========================
        Header
    =========================== -->
  <header class="header header-layout1">
    
      <nav class="navbar navbar-expand-lg sticky-navbar">
          <div class="container-fluid">
              <a class="navbar-brand" href="/">
                <div class="d-flex align-items-center">
                    <img src="{{ url('solatec/assets/images/logo/logoo.png') }}" class="logo" alt="logo" style="height: 40px; width: auto;">
                    <span class="ml-2">PPHM</span>
                </div>
            </a>
              <button class="navbar-toggler" type="button">
                  <span class="menu-lines"><span></span></span>
              </button>
              <div class="collapse navbar-collapse" id="mainNavigation">
                  <ul class="navbar-nav">
                      <li class="nav__item">
                          <a href="{{ url('/') }}" class="nav__item-link">Beranda</a>
                      </li><!-- /.nav-item -->
                      <li class="nav__item">
                        <a href="{{ url('pendaftaran') }}" class="nav__item-link">Pendaftarab</a>
                    </li><!-- /.nav-item -->
                    
                  </ul><!-- /.navbar-nav -->
                  <button class="close-mobile-menu d-block d-lg-none"><i class="fas fa-times"></i></button>
              </div><!-- /.navbar-collapse -->
              
              @if(Auth::check())
              @if(Auth::user()->role == 'user')
        
                <ul class="navbar-nav ml-auto align-items-center">
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }} &nbsp;
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#pesanModal">
                                <i class="fas fa-envelope mr-2"></i> Pesan
                            </a>                            
                        
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('login.store') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="ft-power"></i> Logout
                            </a>                            
                            <form id="logout-form" action="{{ route('login.store') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>                                                                        
                    </li>
                </ul>
              @elseif(Auth::user()->role == 'umkm')
                <ul class="navbar-nav ml-auto align-items-center">
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            UMKM {{ Auth::user()->name }} &nbsp;
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('umkm.dashboard.index') }}">
                                <i class="fas fa-user mr-2"></i> Dashboard
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('login.store') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="ft-power"></i> Logout
                            </a>                            
                            <form id="logout-form" action="{{ route('login.store') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
              @elseif(Auth::user()->role == 'admin')
                <ul class="navbar-nav ml-auto align-items-center">
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Administrator {{ Auth::user()->name }} &nbsp;
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('admin.dashboard.index') }}">
                                <i class="fas fa-user mr-2"></i> Dashboard
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('login.store') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="ft-power"></i> Logout
                            </a>                            
                            <form id="logout-form" action="{{ route('login.store') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
              @endif
          @else
              <ul class="navbar-actions d-none d-xl-flex align-items-center list-unstyled mb-0">
                  <li>
                      <a href="{{ route('login.index') }}" class="btn btn__primary">
                          <span>LOGIN</span>
                          <i class="icon-arrow-right"></i>
                      </a>
                  </li>
              </ul>
          @endif
          
              
              <!-- /.navbar-actions -->
          </div><!-- /.container -->
      </nav><!-- /.navabr -->
  </header><!-- /.Header -->
  <body>
    
<!-- Modal Pesan -->
<div class="modal fade" id="pesanModal" tabindex="-1" role="dialog" aria-labelledby="pesanModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document"> <!-- Modal Size Larger -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pesanModalLabel">Daftar Permintaan Booking</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="font-size: 1.5rem;">&times;</span> <!-- Larger Close Icon -->
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Kegiatan</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody id="bookingRequests">
                        <!-- Konten permintaan booking akan dimuat di sini -->
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success m-r-15" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

  </body>
