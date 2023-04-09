<nav id="navbar" class="navbar">
    <ul>
      <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
      <li><a class="nav-link scrollto" href="#about">Visi, Misi & Tujuan</a></li>
      <li><a class="nav-link scrollto" href="#why-us">Struktur Organisasi</a></li>
      <li><a class="nav-link scrollto" href="#team">Guru & Staf</a></li>
      <li><a class="nav-link scrollto" href="#foto">Foto Kegiatan</a></li>
      @if (Auth::user())
      <li><a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a></li>
      @else
      <li><a class="nav-link" href="{{ route('login') }}">Login</a></li>
      @endif
    </ul>
    <i class="bi bi-list mobile-nav-toggle"></i>
  </nav><!-- .navbar -->
