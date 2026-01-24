@extends('admin.layouts.master')

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
    <h4 class="fw-bold mb-4">Form Pendaftaran Siswa</h4>

    <form
        action="{{ isset($data['Registration'])
            ? route('registration.admin.store', $data['Registration']->id)
            : route('registration.admin.store') }}"
        method="POST" enctype="multipart/form-data">
        @csrf

        @if (isset($data['Registration']))
            @method('PUT')
            <input type="hidden" name="id" value="{{ $data['Registration']->id }}">
        @endif

        <!-- ================= DATA SISWA ================= -->
        <div class="card mb-4 p-4">
            <h6 class="fw-bold mb-3">Data Siswa</h6>

            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Nama Lengkap Siswa</label>
                    <input type="text" class="form-control" name="nama_siswa"
                        value="{{ old('nama_siswa', $data['Registration']->nama_siswa ?? '') }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Tempat Lahir</label>
                    <input type="text" class="form-control" name="tempat_lahir"
                        value="{{ old('tempat_lahir', $data['Registration']->tempat_lahir ?? '') }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Tanggal Lahir</label>
                    <input type="text" class="form-control" name="tanggal_lahir" id="tanggal_lahir"
                        value="{{ old('tanggal_lahir', $data['Registration']->tanggal_lahir ?? '') }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Jenis Kelamin</label>
                    <select class="form-select" name="jenis_kelamin">
                        <option value="">-- Pilih --</option>
                        <option value="Laki-laki"
                            {{ old('jenis_kelamin', $data['Registration']->jenis_kelamin ?? '') == 'Laki-laki' ? 'selected' : '' }}>
                            Laki-laki
                        </option>
                        <option value="Perempuan"
                            {{ old('jenis_kelamin', $data['Registration']->jenis_kelamin ?? '') == 'Perempuan' ? 'selected' : '' }}>
                            Perempuan
                        </option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Alamat Lengkap</label>
                    <input type="text" class="form-control" name="alamat_lengkap"
                        value="{{ old('alamat_lengkap', $data['Registration']->alamat_lengkap ?? '') }}">
                </div>
            </div>
        </div>

        <!-- ================= DATA ORANG TUA ================= -->
        <div class="card mb-4 p-4">
            <h6 class="fw-bold mb-3">Data Orang Tua</h6>

            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Nama Ayah</label>
                    <input type="text" class="form-control" name="nama_ayah"
                        value="{{ old('nama_ayah', $data['Registration']->nama_ayah ?? '') }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Nama Ibu</label>
                    <input type="text" class="form-control" name="nama_ibu"
                        value="{{ old('nama_ibu', $data['Registration']->nama_ibu ?? '') }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Nomor HP Aktif (WhatsApp)</label>
                    <input type="tel" class="form-control" name="nomor_telepon"
                        value="{{ old('nomor_telepon', $data['Registration']->nomor_telepon ?? '') }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Email (Opsional)</label>
                    <input type="email" class="form-control" name="email"
                        value="{{ old('email', $data['Registration']->email ?? '') }}">
                </div>
            </div>
        </div>

        <!-- ================= UPLOAD DOKUMEN ================= -->
        <div class="card mb-4 p-4">
            <h5 class="fw-bold mb-3">Upload Dokumen (Wajib)</h5>

            {{-- FOTO KTP --}}
            <div class="mb-3">
                <label class="form-label">Foto KTP Orang Tua</label>

                @if (isset($data['Registration']) && $data['Registration']->foto_ktp)
                    <div class="mb-2">
                        <a href="{{ asset('storage/' . $data['Registration']->foto_ktp) }}" target="_blank"
                            class="btn btn-sm btn-outline-primary">
                            Lihat KTP
                        </a>
                    </div>
                @endif

                <input type="file" class="form-control" accept=".jpg,.jpeg,.png,.pdf" name="foto_ktp">
            </div>

            {{-- FOTO KK --}}
            <div class="mb-3">
                <label class="form-label">Foto Kartu Keluarga</label>

                @if (isset($data['Registration']) && $data['Registration']->foto_kk)
                    <div class="mb-2">
                        <a href="{{ asset('storage/' . $data['Registration']->foto_kk) }}" target="_blank"
                            class="btn btn-sm btn-outline-primary">
                            Lihat KK
                        </a>
                    </div>
                @endif

                <input type="file" class="form-control" accept=".jpg,.jpeg,.png,.pdf" name="foto_kk">
            </div>

            {{-- PAS FOTO --}}
            <div class="mb-3">
                <label class="form-label">Pas Foto Siswa</label>

                @if (isset($data['Registration']) && $data['Registration']->pas_foto)
                    <div class="mb-2">
                        <a href="{{ asset('storage/' . $data['Registration']->pas_foto) }}" target="_blank"
                            class="btn btn-sm btn-outline-primary">
                            Lihat Pas Foto
                        </a>
                    </div>
                @endif

                <input type="file" class="form-control" accept=".jpg,.jpeg,.png" name="pas_foto">
                <small class="text-muted">
                    * Format JPG/PNG/PDF • Maksimal 2MB
                </small>
            </div>
        </div>

        <!-- ================= INFORMASI PEMBAYARAN ================= -->
        <div class="card mb-4 p-4">
            <h5 class="fw-bold mb-3">Informasi Pembayaran DP</h5>

            <div class="alert alert-warning rounded-4">
                <strong>Pembayaran DP Pendaftaran</strong><br>
                Bank: <strong>Mandiri</strong><br>
                No. Rekening: <strong>1560020036515</strong><br>
                Atas Nama: <strong>Yayasan Pelangi Kasih Peduli Bangsa</strong>
            </div>

            <h5 class="fw-bold mb-3">Upload Bukti Transfer DP</h5>

            @if (isset($data['Registration']) && $data['Registration']->bukti_transfer)
                <div class="mb-2">
                    <a href="{{ asset('storage/' . $data['Registration']->bukti_transfer) }}" target="_blank"
                        class="btn btn-sm btn-outline-success">
                        Lihat Bukti Transfer
                    </a>
                </div>
            @endif

            <input type="file" class="form-control mb-3" accept=".jpg,.jpeg,.png,.pdf" name="bukti_transfer">

            <label class="form-label">Keterangan Tambahan (Opsional)</label>
            <textarea class="form-control" rows="3" name="keterangan">{{ old('keterangan', $data['Registration']->keterangan ?? '') }}</textarea>
        </div>


        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary px-4">
                {{ isset($data['Registration']) ? 'Update Data' : 'Kirim Pendaftaran' }}
            </button>
        </div>
    </form>

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
