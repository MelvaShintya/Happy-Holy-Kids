@extends('website.layouts.master')

@section('title', 'Sekolah Happy Holy Kids')

@section('content')
        @push('scripts')
            @if(session('success'))
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: "{{ session('success') }}",
                        showConfirmButton: false,
                        timer: 2000
                    });
                </script>
            @endif
        @endpush
    <section class="hero text-center">
        <div class="container">
            <h1>Selamat Datang di <br><span class="text-warning">Sekolah Happy Holy Kids</span></h1>
            <p class="mt-3 mb-4">
                Membentuk generasi yang cerdas dan berkarakter sejak usia dini
            </p>
            <a href="#daftar" class="btn btn-warning btn-lg rounded-pill fw-semibold px-5">
                Daftar Sekarang
            </a>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Kenapa Memilih Kami?</h2>
                <p class="section-subtitle">
                    Kami memberikan pendidikan terbaik dengan pendekatan penuh kasih
                </p>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon text-primary"><i class="fa-solid fa-school"></i></div>
                        <h5>Pendidikan Berkualitas</h5>
                        <p>Kurikulum seimbang akademik dan karakter.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon text-danger"><i class="fa-solid fa-graduation-cap"></i></div>
                        <h5>Guru Berpengalaman</h5>
                        <p>Tenaga pendidik profesional dan penuh perhatian.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon text-success"><i class="fa-solid fa-person-chalkboard"></i></div>
                        <h5>Lingkungan Aman</h5>
                        <p>Fasilitas lengkap, aman, dan ramah anak.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
