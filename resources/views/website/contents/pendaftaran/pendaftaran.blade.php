@extends('website.layouts.master')

@section('title', 'Pendaftaran | Sekolah Happy Holy Kids')

@section('content')
    @push('scripts')
        @if ($errors->any())
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    html: `
                        <ul style="text-align:left; padding-left:18px;">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    `,
                });
            </script>
        @endif
    @endpush
    <section id="pendaftaran-page" class="section no-hero bg-light">
        <div class="container">

            <!-- JUDUL -->
            <div class="text-center mb-5">
                <h2 class="section-title">Formulir Pendaftaran Siswa Baru</h2>
                <p class="section-subtitle">
                    Silakan lengkapi data berikut dengan benar untuk proses pendaftaran
                </p>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-8">

                    <div class="form-box">

                        <form action="{{ route('registration.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <!-- ================= DATA SISWA ================= -->
                            <h5 class="fw-bold mb-3">Data Siswa</h5>

                            <div class="mb-3">
                                <label class="form-label">Nama Lengkap Siswa</label>
                                <input type="text" class="form-control" name="nama_siswa">
                            </div>

                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Tempat Lahir</label>
                                    <input type="text" class="form-control" name="tempat_lahir">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Tanggal Lahir</label>
                                    <input type="text" id="tanggal_lahir" class="form-control"
                                        placeholder="Pilih tanggal lahir" name="tanggal_lahir">

                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Jenis Kelamin</label>
                                <select class="form-select" name="jenis_kelamin">
                                    <option value="">-- Pilih --</option>
                                    <option>Laki-laki</option>
                                    <option>Perempuan</option>
                                </select>
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Alamat Lengkap</label>
                                <textarea class="form-control" rows="3" name="alamat_lengkap"></textarea>
                            </div>

                            <!-- ================= DATA ORANG TUA ================= -->
                            <h5 class="fw-bold mb-3">Data Orang Tua / Wali</h5>

                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Nama Ayah</label>
                                    <input type="text" class="form-control" name="nama_ayah">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Nama Ibu</label>
                                    <input type="text" class="form-control" name="nama_ibu">
                                </div>
                            </div>

                            <div class="row g-3 mb-4">
                                <div class="col-md-6">
                                    <label class="form-label">Nomor HP Aktif (WhatsApp)</label>
                                    <input type="tel" class="form-control" name="nomor_telepon">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Email (Opsional)</label>
                                    <input type="email" class="form-control" name="email">
                                </div>
                            </div>

                            <!-- ================= UPLOAD DOKUMEN ================= -->
                            <h5 class="fw-bold mb-3">Upload Dokumen (Wajib)</h5>

                            <div class="mb-3">
                                <label class="form-label">Foto KTP Orang Tua</label>
                                <input type="file" class="form-control" accept=".jpg,.jpeg,.png,.pdf" name="foto_ktp">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Foto Kartu Keluarga</label>
                                <input type="file" class="form-control" accept=".jpg,.jpeg,.png,.pdf" name="foto_kk">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Foto Akta Lahir</label>
                                <input type="file" class="form-control" accept=".jpg,.jpeg,.png,.pdf" name="foto_akta_lahir">
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Pas Foto Siswa</label>
                                <input type="file" class="form-control" accept=".jpg,.jpeg,.png" name="pas_foto">
                                <small class="text-muted">
                                    * Format JPG/PNG/PDF • Maksimal 2MB
                                </small>
                            </div>

                            <!-- ================= INFORMASI PEMBAYARAN ================= -->
                            <h5 class="fw-bold mb-3">Informasi Pembayaran DP</h5>

                            <div class="alert alert-warning rounded-4">
                                <strong>Pembayaran DP Pendaftaran</strong><br>
                                Bank: <strong>Mandiri</strong><br>
                                No. Rekening: <strong>1560020036515</strong><br>
                                Atas Nama: <strong>Yayasan Pelangi Kasih Peduli Bangsa</strong>
                            </div>

                            <!-- ================= BUKTI TRANSFER ================= -->
                            <h5 class="fw-bold mb-3">Upload Bukti Transfer DP</h5>

                            <div class="mb-3">
                                <label class="form-label">Bukti Transfer DP</label>
                                <input type="file" class="form-control" accept=".jpg,.jpeg,.png,.pdf" name="bukti_transfer">
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Keterangan Tambahan (Opsional)</label>
                                <textarea class="form-control" rows="3" placeholder="Contoh: transfer via mobile banking" name="keterangan"></textarea>
                            </div>

                            <!-- ================= SUBMIT ================= -->
                            <button type="submit" class="btn btn-success w-100 py-3 fw-bold rounded-pill">
                                Kirim Formulir Pendaftaran
                            </button>

                            <p class="text-center text-muted mt-3 small">
                                Dengan mengirim formulir ini, data akan diverifikasi oleh admin sekolah.
                            </p>

                        </form>

                    </div>

                </div>
            </div>

        </div>
    </section>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <script>
        flatpickr("#tanggal_lahir", {
            locale: "id",
            altInput: true,
            altFormat: "d-m-Y",
            dateFormat: "Y-m-d",
            yearSelectorType: "dropdown",
            allowInput: true
        });
    </script>
@endsection
