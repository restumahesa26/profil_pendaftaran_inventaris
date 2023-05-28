<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item @if(Route::is('dashboard')) active @endif">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="mdi mdi-grid-large menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        @if (Auth::user()->role == 'wali-murid')
        <li class="nav-item nav-category">PPDB</li>
        <li class="nav-item @if(Route::is('pendaftaran.*')) active @endif">
            <a class="nav-link" href="{{ route('pendaftaran.index') }}">
                <i class="mdi mdi-grid-large menu-icon"></i>
                <span class="menu-title">Pendaftaran</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link @if(Route::is('pembayaran.*')) active @endif" href="{{ route('pembayaran.index') }}">
                <i class="mdi mdi-grid-large menu-icon"></i>
                <span class="menu-title">Pembayaran</span>
            </a>
        </li>
        @else
        <li class="nav-item nav-category">Profil Sekolah</li>
        <li class="nav-item @if(Route::is('visi-misi-tujuan.*') || Route::is('struktur-organisasi.*') || Route::is('guru-staf.*') || Route::is('foto-kegiatan.*')) active @endif">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false"
                aria-controls="ui-basic">
                <i class="menu-icon mdi mdi-floor-plan"></i>
                <span class="menu-title">Profil Sekolah</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse @if(Route::is('visi-misi-tujuan.*') || Route::is('struktur-organisasi.*') || Route::is('guru-staf.*') || Route::is('foto-kegiatan.*')) show @endif" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item @if(Route::is('visi-misi-tujuan.*')) active @endif"> <a class="nav-link" href="{{ route('visi-misi-tujuan.index') }}">Visi, Misi, dan Tujuan</a></li>
                    <li class="nav-item @if(Route::is('struktur-organisasi.*')) active @endif"> <a class="nav-link" href="{{ route('struktur-organisasi.index') }}">Struktur Organisasi</a></li>
                    <li class="nav-item @if(Route::is('guru-staf.*')) active @endif"> <a class="nav-link" href="{{ route('guru-staf.index') }}">Data Guru dan Staf</a>
                    </li>
                    <li class="nav-item @if(Route::is('foto-kegiatan.*')) active @endif"> <a class="nav-link" href="{{ route('foto-kegiatan.index') }}">Foto Kegiatan</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item nav-category">PPDB</li>
        <li class="nav-item @if(Route::is('periode.*') || Route::is('wali-murid.*') || Route::is('admin-pendaftaran.*') || Route::is('admin-pembayaran.*')) active @endif">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic1" aria-expanded="false"
                aria-controls="ui-basic1">
                <i class="menu-icon mdi mdi-floor-plan"></i>
                <span class="menu-title">PPDB</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse @if(Route::is('periode.*') || Route::is('wali-murid.*') || Route::is('admin-pendaftaran.*') || Route::is('admin-pembayaran.*')) show @endif" id="ui-basic1">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item @if(Route::is('periode.*')) active @endif"> <a class="nav-link" href="{{ route('periode.index') }}">Data Periode</a></li>
                    <li class="nav-item @if(Route::is('wali-murid.*')) active @endif"> <a class="nav-link" href="{{ route('wali-murid.index') }}">Data Wali Murid</a></li>
                    <li class="nav-item @if(Route::is('admin-pendaftaran.*')) active @endif"> <a class="nav-link" href="{{ route('admin-pendaftaran.index') }}">Data Pendaftaran</a></li>
                    <li class="nav-item @if(Route::is('admin-pembayaran.*')) active @endif"> <a class="nav-link" href="{{ route('admin-pembayaran.index') }}">Data Pembayaran</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item nav-category">Inventaris</li>
        <li class="nav-item @if(Route::is('data-ruangan.*') || Route::is('data-barang.*') || Route::is('data-inventaris.*')) active @endif">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic2" aria-expanded="false"
                aria-controls="ui-basic2">
                <i class="menu-icon mdi mdi-floor-plan"></i>
                <span class="menu-title">Inventaris</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse @if(Route::is('data-ruangan.*') || Route::is('data-barang.*') || Route::is('data-inventaris.*') || Route::is('laporan.*')) show @endif" id="ui-basic2">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item @if(Route::is('data-ruangan.*')) active @endif"> <a class="nav-link" href="{{ route('data-ruangan.index') }}">Data Ruangan</a></li>
                    <li class="nav-item @if(Route::is('data-barang.*')) active @endif"> <a class="nav-link" href="{{ route('data-barang.index') }}">Data Barang</a></li>
                    <li class="nav-item @if(Route::is('data-inventaris.*')) active @endif"> <a class="nav-link" href="{{ route('data-inventaris.index') }}">Data Inventaris</a>
                    </li>
                    <li class="nav-item @if(Route::is('laporan.*')) active @endif"> <a class="nav-link" href="{{ route('laporan.index') }}">Laporan</a>
                    </li>
                </ul>
            </div>
        </li>
        @endif
    </ul>
</nav>
