<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <img src="{{ asset('template/img/logo/logo2.png') }}">
        </div>
        <div class="sidebar-brand-text mx-3">RuangAdmin</div>
    </a>
    @if (Auth::user()->name)
    <hr class="sidebar-divider my-0">
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Features
    </div>
    <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap"
            aria-expanded="true" aria-controls="collapseBootstrap">
            <i class="far fa-fw fa-window-maximize"></i>
            <span>Master</span>
        </a>
        <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Master Data</h6>
                <a class="collapse-item" href="{{ route('mahasiswa') }}">Mahasiswa</a>
                <a class="collapse-item" href="{{ route('dosen') }}">Dosen</a>
                <a class="collapse-item" href="{{ route('matakuliah') }}">Mata Kuliah</a>
                <a class="collapse-item" href="{{ route('golongan') }}">Golongan</a>
                <a class="collapse-item" href="{{ route('ruang') }}">Ruangan</a>
                <a class="collapse-item" href="{{ route('pengampu') }}">Pengampu</a>
                <a class="collapse-item" href="{{ route('jadwal_akademik') }}">Jadwal Akademik</a>
                <a class="collapse-item" href="{{ route('krs') }}">KRS</a>
            </div>
        </div>
    </li>
    @else
    <hr class="sidebar-divider my-0">
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('dashboard_mhs') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('presensi') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Presensi</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('riwayat_presensi') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Riwayat Presensi</span></a>
    </li>
    <hr class="sidebar-divider">
    @endif
</ul>