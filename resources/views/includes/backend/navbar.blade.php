<div class="page-header">
    <div class="header-wrapper row m-0">
        <div class="header-logo-wrapper">
            <div class="logo-wrapper">
                <a href="index.html">
                    <img class="img-fluid" src="../assets/images/logo/logo.png" alt="">
                </a>
            </div>
            <div class="toggle-sidebar">
                <i class="status_toggle middle sidebar-toggle" data-feather="sliders"></i>
            </div>
        </div>
        <div class="left-header col horizontal-wrapper pl-0">
            <ul class="horizontal-menu">
                <li class="mega-menu outside d-block d-md-none">
                    <a class="nav-link" href="{{ route('login.store') }}"
                        onclick=" event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i data-feather="log-out"></i>
                        <span>
                            Log out
                        </span>
                    </a>
                </li>                
            </ul>
        </div>
        <div class="nav-right col-8 pull-right right-header p-0">
            <ul class="nav-menus">
                <li>
                    <div class="mode">
                        <a href="#" data-toggle="tooltip" data-placement="bottom" title="Dark Mode">
                            <i data-feather="moon"></i>
                        </a>
                    </div>
                </li>
                <li class="maximize">
                    <a data-toggle="tooltip" data-placement="bottom" title="Full Screen" class="text-dark"
                        href="#!" onclick="javascript:toggleFullScreen()">
                        <i data-feather="maximize"></i>
                    </a>
                </li>
                <li class="profile-nav onhover-dropdown p-0 ml-2 mr-0">
                    <div class="media profile-media">
                        <img class="b-r-10"
                            src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&background=5a983f&color=fff"
                            width="40px">
                            <div class="media-body">
                                <span>{{ Auth::user()->name }}</span>
                                <p class="mb-0 font-roboto">
                                    @if(Auth::check())
                                        @if(Auth::user()->role == 'admin')
                                            Administrator
                                        @elseif(Auth::user()->role == 'umkm')
                                            UMKM
                                        @else
                                            Anonymous
                                        @endif
                                        <i class="middle fa fa-angle-down"></i>
                                    @else
                                        Anonymous
                                    @endif
                                </p>
                            </div>                            
                    </div>
                    <ul class="profile-dropdown onhover-show-div">
                        <li>
                            <a href="{{ route('login.store') }}"
                                onclick=" event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                <i data-feather="log-out"></i>
                                <span>Log out</span>
                            </a>
                        </li>
                        <form id="logout-form" action="{{ route('login.store') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
