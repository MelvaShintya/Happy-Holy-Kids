@extends('website.layouts.master')

@section('title', 'Profil | Sekolah Happy Holy Kids')

@section('content')
    {{-- <section class="hero text-center">
        <div class="container">
            <h1>Sekolah Ramah Anak<br><span class="text-warning">Happy Holy Kids</span></h1>
            <p class="mt-3 mb-4">
                Pendidikan karakter, kreativitas, dan kasih sayang untuk masa depan anak Anda
            </p>
        </div>
    </section> --}}
    <section id="profil-page" class="section no-hero bg-light">

        <!-- HERO PROFIL -->
        <div class="container text-center mb-5">
            <h2 class="section-title">Profil Sekolah</h2>
            <p class="section-subtitle">
                Mengenal lebih dekat Sekolah Happy Holy Kids sebagai tempat terbaik untuk tumbuh dan belajar
            </p>
        </div>

        <!-- SEJARAH -->
        <div class="container mb-5">
            <div class="row align-items-center g-4">
                <div class="col-md-6">
                    <img src="{{ asset('assets/images/profil.jpeg') }}" class="img-fluid rounded-4 shadow">
                </div>
                <div class="col-md-6">
                    <h3 class="fw-bold mb-3">Sejarah Sekolah</h3>
                    <p>
                        Sekolah Happy Holy Kids merupakan lembaga pendidikan anak usia dini dan pendidikan dasar yang
                        berfokus pada pengembangan karakter, kreativitas, serta potensi anak secara optimal melalui
                        pendekatan pembelajaran yang menyenangkan dan holistik. Sekolah ini berada di bawah naungan Yayasan
                        Pelangi Kasih Peduli Bangsa dan berlokasi di kawasan Grandwisata, Bekasi.
                    </p>
                    <p>
                        Sebagai lembaga pendidikan nonformal, Sekolah Happy Holy Kids berkomitmen untuk mendampingi tumbuh
                        kembang anak secara menyeluruh, mencakup aspek akademik, sosial, emosional, dan motorik. Proses
                        pembelajaran dirancang secara interaktif dan terstruktur, serta disesuaikan dengan tahapan
                        perkembangan anak. Berbagai program pembelajaran disediakan, mulai dari pembelajaran dasar,
                        pengenalan lingkungan, hingga kegiatan kreatif dan keagamaan, guna membentuk anak yang cerdas,
                        berkarakter, dan berakhlak baik.
                    </p>
                </div>
            </div>
        </div>

        <!-- VISI & MISI -->
        <div class="container mb-5">
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="feature-card">
                        <h4 class="fw-bold text-primary mb-3">Visi</h4>
                        <p>
                            Membentuk generasi yang cerdas dan berkarakter sejak usia dini.
                        </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="feature-card">
                        <h4 class="fw-bold text-success mb-3">Misi</h4>
                        <ul class="text-start ps-3">
                            <li>Menjadi partner bagi orang tua dalam mendidik anak</li>
                            <li>Mengoptimalkan bakat anak sedari dini</li>
                            <li>Mencerdaskan kehidupan bangsa</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- PROGRAM PEMBELAJARAN -->
        <div class="container mb-5">
            <h3 class="fw-bold text-center mb-4">Program Pembelajaran</h3>
            <div class="row g-4">

                <div class="col-md-4">
                    <div class="feature-card text-center">
                        <div class="feature-icon text-warning">
                            <i class="fa-solid fa-book-open"></i>
                        </div>
                        <h5>Literasi & Numerasi</h5>
                        <p>Pengenalan membaca, menulis, dan berhitung secara menyenangkan.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="feature-card text-center">
                        <div class="feature-icon text-danger">
                            <i class="fa-solid fa-palette"></i>
                        </div>
                        <h5>Seni & Kreativitas</h5>
                        <p>Mengembangkan imajinasi melalui seni rupa, musik, dan gerak.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="feature-card text-center">
                        <div class="feature-icon text-success">
                            <i class="fa-solid fa-handshake"></i>
                        </div>
                        <h5>Pendidikan Karakter</h5>
                        <p>Menanamkan nilai sopan santun, empati, dan kemandirian.</p>
                    </div>
                </div>

            </div>
        </div>


        <!-- FASILITAS -->
        <div class="container mb-5">
            <h3 class="fw-bold text-center mb-4">Fasilitas Sekolah</h3>
            {{-- <div class="row g-4">

                <div class="col-md-3">
                    <div class="feature-card text-center">
                        <i class="fa-solid fa-school fa-2x text-primary"></i>
                        <h6 class="fw-semibold mt-2">Ruang Kelas Nyaman</h6>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="feature-card text-center">
                        <i class="fa-solid fa-puzzle-piece fa-2x text-warning"></i>
                        <h6 class="fw-semibold mt-2">Area Bermain Edukatif</h6>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="feature-card text-center">
                        <i class="fa-solid fa-shield-halved fa-2x text-success"></i>
                        <h6 class="fw-semibold mt-2">Keamanan Terjamin</h6>
                    </div>
                </div>

            </div> --}}
            <div class="row g-3">
                <div class="col-md-3"><img src="{{ asset('assets/images/fasilitas/1.jpg') }}" class="img-fluid rounded-3">
                </div>
                <div class="col-md-3"><img src="{{ asset('assets/images/fasilitas/2.jpg') }}" class="img-fluid rounded-3">
                </div>
                <div class="col-md-3"><img src="{{ asset('assets/images/fasilitas/3.jpg') }}" class="img-fluid rounded-3">
                </div>
                <div class="col-md-3"><img src="{{ asset('assets/images/fasilitas/4.jpg') }}" class="img-fluid rounded-3">
                </div>
            </div>
        </div>

        <!-- GALERI -->
        <div class="container mb-5">
            <h3 class="fw-bold text-center mb-4">Guru Berpengalaman</h3>
            <div class="row g-3">


                <div class="col-md-3 text-center">
                    <img src="{{ asset('assets/images/guru/3.jpg') }}" class="img-fluid rounded-3 mb-2">
                    <p class="fw-semibold mb-0">Ibu Liani (Kepala Sekolah)</p>
                </div>

                <div class="col-md-3 text-center">
                    <img src="{{ asset('assets/images/guru/2.jpg') }}" class="img-fluid rounded-3 mb-2">
                    <p class="fw-semibold mb-0">Ibu Martini (Tata Usaha)</p>
                </div>

                <div class="col-md-3 text-center">
                    <img src="{{ asset('assets/images/guru/1.jpg') }}" class="img-fluid rounded-3 mb-2">
                    <p class="fw-semibold mb-0">Ms. Nata (Administrasi)</p>
                </div>

                <div class="col-md-3 text-center">
                    <img src="{{ asset('assets/images/guru/4.jpg') }}" class="img-fluid rounded-3 mb-2">
                    <p class="fw-semibold mb-0">Ms. Sofie (Guru Playgroup)</p>
                </div>

                <div class="col-md-3 text-center">
                    <img src="{{ asset('assets/images/guru/5.jpg') }}" class="img-fluid rounded-3 mb-2">
                    <p class="fw-semibold mb-0">Ms. Lia (Guru TK A)</p>
                </div>

                <div class="col-md-3 text-center">
                    <img src="{{ asset('assets/images/guru/6.jpeg') }}" class="img-fluid rounded-3 mb-2">
                    <p class="fw-semibold mb-0">Ms. Ana (Guru TK B)</p>
                </div>
            </div>
            <!-- GALERI -->
            <div class="container mb-5">
                <h3 class="fw-bold text-center mb-4">Foto Kegiatan Hari Jumat</h3>
                <div class="row g-3">
                    <div class="col-md-3"><img src="{{ asset('assets/images/kegiatan/1.jpg') }}"
                            class="img-fluid rounded-3">
                    </div>
                    <div class="col-md-3"><img src="{{ asset('assets/images/kegiatan/2.jpg') }}"
                            class="img-fluid rounded-3">
                    </div>
                    <div class="col-md-3"><img src="{{ asset('assets/images/kegiatan/3.jpg') }}"
                            class="img-fluid rounded-3">
                    </div>
                    <div class="col-md-3"><img src="{{ asset('assets/images/kegiatan/4.jpg') }}"
                            class="img-fluid rounded-3">
                    </div>
                </div>
            </div>


            <div class="container mb-5">
                <h3 class="fw-bold text-center mb-4">Foto Kegiatan Kelas PG</h3>
                <div class="row g-3">
                    <div class="col-md-3"><img src="{{ asset('assets/images/Kelas PG/1.jpg') }}"
                            class="img-fluid rounded-3">
                    </div>
                    <div class="col-md-3"><img src="{{ asset('assets/images/Kelas PG/2.jpg') }}"
                            class="img-fluid rounded-3">
                    </div>
                    <div class="col-md-3"><img src="{{ asset('assets/images/Kelas PG/3.jpg') }}"
                            class="img-fluid rounded-3">
                    </div>
                    <div class="col-md-3"><img src="{{ asset('assets/images/Kelas PG/4.jpg') }}"
                            class="img-fluid rounded-3">
                    </div>
                </div>
            </div>

            <div class="container mb-5">
                <h3 class="fw-bold text-center mb-4">Foto Kegiatan Kelas TK A</h3>
                <div class="row g-3">
                    <div class="col-md-3"><img src="{{ asset('assets/images/Kelas TK A/1.jpg') }}"
                            class="img-fluid rounded-3">
                    </div>
                    <div class="col-md-3"><img src="{{ asset('assets/images/Kelas TK A/2.jpg') }}"
                            class="img-fluid rounded-3">
                    </div>
                    <div class="col-md-3"><img src="{{ asset('assets/images/Kelas TK A/3.jpg') }}"
                            class="img-fluid rounded-3">
                    </div>
                    {{-- <div class="col-md-3"><img src="{{ asset('assets/images/Kelas TK A/4.jpg') }}" class="img-fluid rounded-3">
                </div> --}}
                </div>
            </div>

            <div class="container mb-5">
                <h3 class="fw-bold text-center mb-4">Foto Kegiatan Kelas TK B</h3>
                <div class="row g-3">
                    <div class="col-md-3"><img src="{{ asset('assets/images/Kelas TK B/1.jpg') }}"
                            class="img-fluid rounded-3">
                    </div>
                    <div class="col-md-3"><img src="{{ asset('assets/images/Kelas TK B/2.jpg') }}"
                            class="img-fluid rounded-3">
                    </div>
                    <div class="col-md-3"><img src="{{ asset('assets/images/Kelas TK B/3.jpg') }}"
                            class="img-fluid rounded-3">
                    </div>
                    <div class="col-md-3"><img src="{{ asset('assets/images/Kelas TK B/4.jpg') }}"
                            class="img-fluid rounded-3">
                    </div>
                </div>
            </div>

            <!-- LOKASI & KONTAK -->
            <div class="container mb-5">
                <h3 class="fw-bold text-center mb-4">Alamat & Kontak Sekolah</h3>

                <div class="row g-4">
                    <div class="col-md-7">
                        <!-- GOOGLE MAP -->
                        <iframe src="https://www.google.com/maps?q=Living+World+Grand+Wisata+Bekasi&output=embed"
                            width="100%" height="350" style="border:0; border-radius:18px;" loading="lazy">
                        </iframe>
                    </div>

                    <div class="col-md-5">
                        <div class="feature-card text-start">

                            <p>
                                <strong>
                                    <i class="fa-solid fa-location-dot text-danger me-2"></i>
                                    Alamat:
                                </strong><br>
                                Grand Wisata, Mall Living World Lantai 3
                            </p>

                            {{-- <p>
                            <strong>
                                <i class="fa-solid fa-phone text-primary me-2"></i>
                                Telepon:
                            </strong><br>
                            021-12345678
                        </p> --}}

                            <p>
                                <strong>
                                    <i class="fa-brands fa-whatsapp text-success me-2"></i>
                                    WhatsApp:
                                </strong><br>
                                <a href="https://wa.me/6289644763689" target="_blank">
                                    0896-4476-3689
                                </a>
                            </p>

                            <p class="mb-0">
                                <strong>
                                    <i class="fa-solid fa-envelope text-warning me-2"></i>
                                    Email:
                                </strong><br>
                                sekretariat.hhkgw@gmail.com
                            </p>

                        </div>
                    </div>
                </div>
            </div>

    </section>

    <script>
        flatpickr("#tanggalLahir", {
            locale: "id",
            altInput: true,
            altFormat: "d-m-Y",
            dateFormat: "d-m-Y",
            yearSelectorType: "dropdown",
            allowInput: true
        });
    </script>
@endsection
