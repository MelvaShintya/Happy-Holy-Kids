{{-- Navbar --}}
<nav class="navbar navbar-expand-lg bg-white shadow-sm fixed-top">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
            <img src="{{ asset('assets/images/logo.png') }}" height="60" class="me-2">
            <span>Happy Holy Kids</span>
        </a>

        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Beranda</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('profil') }}">Profil</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('registration') }}">Pendaftaran</a></li>
            </ul>
            <a href="{{ route('registration') }}" class="btn btn-cta">Daftar Sekarang</a>
        </div>
    </div>
</nav>