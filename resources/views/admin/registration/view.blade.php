@extends('admin.layouts.master')

@section('content')
    <h4 class="fw-bold mb-4">Detail Pendaftar</h4>

    <div class="card p-4 mb-4">
        <h6 class="fw-bold">Data Siswa</h6>
        <p><strong>Nama Siswa:</strong> {{ $data['Registration']->nama_siswa }}</p>
        <p><strong>Tanggal Lahir:</strong> {{ $data['Registration']->tempat_lahir }}, {{ \Carbon\Carbon::parse($data['Registration']->tanggal_lahir)->format('d-m-Y') }}</p>
        <p><strong>Jenis Kelamin:</strong> {{ $data['Registration']->jenis_kelamin }}</p>
        <p><strong>Alamat:</strong> {{ $data['Registration']->alamat_lengkap }}</p>
    </div>

    <div class="card p-4 mb-4">
        <h6 class="fw-bold">Data Orang Tua</h6>
        <p><strong>Ayah:</strong> {{ $data['Registration']->nama_ayah }}</p>
        <p><strong>Ibu:</strong> {{ $data['Registration']->nama_ibu }}</p>
        <p><strong>No HP:</strong> {{ $data['Registration']->nomor_telepon }}</p>
        <p><strong>Email:</strong> {{ $data['Registration']->email }}</p>
    </div>

    <div class="card p-4 mb-4">
        <h6 class="fw-bold">Dokumen</h6>
        <p><strong>Foto KTP Orang Tua:</strong> <a href="{{ asset('storage/' . $data['Registration']->foto_ktp) }}" target="_blank">KTP Orang Tua</a></p>
        <p><strong>Foto Kartu Keluarga:</strong> <a href="{{ asset('storage/' . $data['Registration']->foto_kk) }}" target="_blank">Kartu Keluarga</a></p>
        <p><strong>Foto Akte Lahir:</strong> <a href="{{ asset('storage/' . $data['Registration']->foto_akte_lahir) }}" target="_blank">Akte Lahir</a></p>
        <p><strong>Pas Foto Siswa:</strong> <a href="{{ asset('storage/' . $data['Registration']->pas_foto) }}" target="_blank">Foto Siswa</a></p>
    </div>

    <div class="card p-4 mb-4">
        <h6 class="fw-bold">Bukti Transfer DP</h6>
        <p><strong>Bukti Transfer DP:</strong> <a href="{{ asset('storage/' . $data['Registration']->bukti_transfer) }}" target="_blank">Bukti Transfer DP</a></p>
        <p><strong>Keterangan:</strong> {{ $data['Registration']->keterangan }}</p>
    </div>

    <a href="{{ route('registration.list') }}" class="btn btn-secondary">← Kembali ke Daftar</a>
@endsection
