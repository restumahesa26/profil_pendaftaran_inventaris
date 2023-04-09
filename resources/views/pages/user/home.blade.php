@extends('layouts.home')

@section('content')
<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">

    <div class="container">
        <div class="row">
            <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1"
                data-aos="fade-up" data-aos-delay="200">
                <h1>MTs ROUDLOTUR ROSMANI</h1>
                <h2>Jln. Kramat Teluk, Kel. Betungan, Kec. Selebar, Kota Bengkulu, Prov. Bengkulu </h2>
                <div class="d-flex justify-content-center justify-content-lg-start">
                    <a href="#about" class="btn-get-started scrollto">Get Started</a>
                    <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="glightbox btn-watch-video"><i
                            class="bi bi-play-circle"></i><span>Watch Video</span></a>
                </div>
            </div>
            <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
                <img src="{{ url('hero-1.png') }}" class="img-fluid animated" alt="">
            </div>
        </div>
    </div>

</section><!-- End Hero -->

<main id="main">

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Visi, Misi, dan Tujuan</h2>
            </div>

            <div class="row content justify-content-center">
                <div class="col-lg-6">
                    <div class="text-center">
                        <h2>VISI</h2>
                    </div>
                    @if ($visi)
                    <div class="text-center">
                        {!! $visi->isi !!}
                    </div>
                    @else
                    <div class="text-center">
                        <h4 class="text-danger">Data Visi Belum Dimasukkan</h4>
                    </div>
                    @endif
                </div>
                <div class="col-lg-6">
                    <div class="text-center">
                        <h2>MISI</h2>
                    </div>
                    @if ($misi)
                    {!! $misi->isi !!}
                    @else
                    <div class="text-center">
                        <h4 class="text-danger">Data Misi Belum Dimasukkan</h4>
                    </div>
                    @endif
                </div>
                <div class="col-lg-6 pt-4">
                    <div class="text-center">
                        <h2>TUJUAN</h2>
                    </div>
                    @if ($tujuan)
                    {!! $tujuan->isi !!}
                    @else
                    <div class="text-center">
                        <h4 class="text-danger">Data Tujuan Belum Dimasukkan</h4>
                    </div>
                    @endif
                </div>
            </div>

        </div>
    </section><!-- End About Us Section -->

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us section-bg">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Struktur Organisasi</h2>
            </div>
            <div class="row">
                <div class="col-lg-12 d-flex flex-column justify-content-center align-items-stretch order-2 order-lg-1">
                    <div class="content">
                        <div class="text-center">
                            @if ($struktur)
                            <img src="{{ asset('images/struktur-organisasi/' . $struktur->struktur_organisasi) }}"
                                alt="" style="width: 100%">
                            @else
                            <h4 class="text-danger">Struktur Organisasi Belum Dimasukkan</h4>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Why Us Section -->

    <section id="team" class="team">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Data Guru dan Staf</h2>
            </div>

            <div class="row">
                @forelse ($guru as $item)
                <div class="col-lg-6">
                    <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="100">
                        <div class="pic"><img src="{{ asset('images/foto/' . $item->foto) }}" class="img-fluid" alt="">
                        </div>
                        <div class="member-info">
                            <h4>{{ $item->nama }}</h4>
                            <span>{{ $item->bidang }}</span>
                            <p>Lulusan {{ $item->pendidikan_terakhir_tingkat }} pada Jurusan
                                {{ $item->pendidikan_terakhir_jurusan }} yang Lulus pada tahun
                                {{ $item->pendidikan_terakhir_tahun_lulus }}</p>
                            <div class="social">
                                <a href="{{ $item->facebook }}"><i class="ri-facebook-fill"></i></a>
                                <a href="{{ $item->instagram }}"><i class="ri-instagram-fill"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-lg-12">
                    <div class="text-center">
                        <h4 class="text-danger">Data Guru dan Staf Belum Dimasukkan</h4>
                    </div>
                </div>
                @endforelse

            </div>

        </div>
    </section><!-- End Team Section -->

    <section id="foto" class="foto section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Foto Kegiatan</h2>
            </div>

            @if ($foto)
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    @forelse ($foto as $key => $item)
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{ $key }}" aria-label="Slide {{ $key+1 }}" @if($key == 0) class="active" @endif></button>
                    @empty

                    @endforelse
                </div>
                <div class="carousel-inner">
                    @forelse ($foto as $key => $item)
                    <div class="carousel-item @if($key == 0) active @endif">
                        <img src="{{ asset('images/gambar-foto-kegiatan/' . $item->gambar) }}" class="d-block w-100">
                    </div>
                    @empty

                    @endforelse
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            @else
            <div class="text-center">
                <h4 class="text-danger">Data Guru dan Staf Belum Dimasukkan</h4>
            </div>
            @endif
        </div>
    </section><!-- End Team Section -->



</main><!-- End #main -->
@endsection
