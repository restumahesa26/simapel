<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon">
            <img src="{{ url('logo-iain.png') }}">
        </div>
        <div class="sidebar-brand-text mx-3">IAIN Kerinci</div>
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item @if(Route::is('dashboard')) active @endif">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-check-circle"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Main Menu
    </div>
    @if (Auth::user()->role === 'MAHASISWA')
    <li class="nav-item @if(Route::is('seminar-proposal.*')) active @endif">
        <a class="nav-link" href="{{ route('seminar-proposal.index') }}">
            <i class="fas fa-fw fa-map"></i>
            <span>Daftar Seminar Proposal</span>
        </a>
    </li>
    <li class="nav-item @if(Route::is('izin-penelitian.*')) active @endif">
        <a class="nav-link" href="{{ route('izin-penelitian.index') }}">
            <i class="fas fa-fw fa-address-book"></i>
            <span>Izin Penelitian</span>
        </a>
    </li>
    <li class="nav-item @if(Route::is('kartu-bimbingan.*')) active @endif">
        <a class="nav-link" href="{{ route('kartu-bimbingan.index') }}">
            <i class="fas fa-fw fa-book"></i>
            <span>Kartu Bimbingan</span>
        </a>
    </li>
    <li class="nav-item @if(Route::is('ujian-skripsi.*')) active @endif">
        <a class="nav-link" href="{{ route('ujian-skripsi.index') }}">
            <i class="fas fa-fw fa-graduation-cap"></i>
            <span>Daftar Ujian Skripsi</span>
        </a>
    </li>
    @elseif (Auth::user()->role === 'ADMIN')
    <li class="nav-item @if(Route::is('admin.seminar-proposal.*')) active @endif">
        <a class="nav-link" href="{{ route('admin.seminar-proposal.index') }}">
            <i class="fas fa-fw fa-map"></i>
            <span>Daftar Seminar Proposal</span>
        </a>
    </li>
    <li class="nav-item @if(Route::is('admin.izin-penelitian.*')) active @endif">
        <a class="nav-link" href="{{ route('admin.izin-penelitian.index') }}">
            <i class="fas fa-fw fa-address-book"></i>
            <span>Izin Penelitian</span>
        </a>
    </li>
    <li class="nav-item @if(Route::is('admin.kartu-bimbingan.*')) active @endif">
        <a class="nav-link" href="{{ route('admin.kartu-bimbingan.index') }}">
            <i class="fas fa-fw fa-book"></i>
            <span>Kartu Bimbingan</span>
        </a>
    </li>
    <li class="nav-item @if(Route::is('admin.ujian-skripsi.*')) active @endif">
        <a class="nav-link" href="{{ route('admin.ujian-skripsi.index') }}">
            <i class="fas fa-fw fa-graduation-cap"></i>
            <span>Daftar Ujian Skripsi</span>
        </a>
    </li>
    <li class="nav-item @if(Route::is('data-mahasiswa.*')) active @endif">
        <a class="nav-link" href="{{ route('data-mahasiswa.index') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Data Mahasiswa</span>
        </a>
    </li>
    @endif
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Personal
    </div>
    <li class="nav-item @if(Route::is('profile.*')) active @endif">
        <a class="nav-link" href="{{ route('profile.edit') }}">
            <i class="fas fa-fw fa-user"></i>
            <span>Profile</span>
        </a>
    </li>
    <hr class="sidebar-divider">
    <div class="version" id="version-ruangadmin"></div>
</ul>
