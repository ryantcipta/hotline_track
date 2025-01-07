<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Main</div>
                    <a class="nav-link" href="{{url('/dashboard')}}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    {{-- <a class="nav-link" href="{{url('/tracking')}}">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-magnifying-glass"></i></div>
                        Tracking
                    </a> --}}
                    {{-- <a class="nav-link" href="{{route('pengiriman')}}">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-truck-front"></i></div>
                        Pengiriman
                    </a> --}}
                    <a class="nav-link" href="{{url('order')}}">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-clipboard-list"></i></div>
                        Order
                    </a>
                    
                
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
               {{Auth::user()->username}}
            </div>
        </nav>
    </div>