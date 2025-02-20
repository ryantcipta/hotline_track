<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3">Admin</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Profile Icon di sebelah kanan -->
    <ul class="navbar-nav ms-auto me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-user fa-fw"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                {{-- <li><a class="dropdown-item" href="#!">Settings</a></li> --}}
                <li><a class="dropdown-item" href="{{url('profile')}}"><i class="fa-solid fa-address-card"></i> Profile</a></li>
                <li><hr class="dropdown-divider" /></li> 
                <li><a class="dropdown-item" href="{{route('password.change')}}"><i class="fa-solid fa-key"></i> Change Password</a></li>
                <li><hr class="dropdown-divider" /></li> 
                <li><a class="dropdown-item" href="{{route('logout')}}"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</a></li>
            </ul>
        </li>
    </ul>
</nav>
