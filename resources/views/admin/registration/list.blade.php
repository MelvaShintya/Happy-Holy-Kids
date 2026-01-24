@extends('admin.layouts.master')

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

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold">Daftar Pendaftar</h4>
        <div>
            <a href="{{ route('registration.form') }}" class="btn btn-primary me-2">+ Tambah</a>
            <a href="{{ route('registration.export') }}" class="btn btn-success">⬇ Download Excel</a>
        </div>
    </div>

    <div class="card mb-3 p-3">
        <form method="GET" action="{{ route('registration.list') }}">
            <input type="text" name="search" value="{{ request('search') }}" class="form-control"
                placeholder="Cari nama siswa / orang tua...">
        </form>

        {{-- <input type="text" class="form-control" placeholder="Cari nama siswa / orang tua..."> --}}
    </div>

    <div class="card shadow-sm">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Nama Lengkap Siswa</th>
                        <th>Jenis Kelamin</th>
                        <th>Tanggal Lahir</th>
                        <th>Tanggal Daftar</th>
                        <th width="180">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data['Registration'] as $i => $v)
                        <tr>
                            <td>{{ $data['Registration']->firstItem() + $loop->index }}</td>
                            <td>{{ $v->nama_siswa }}</td>
                            <td>{{ $v->jenis_kelamin }}</td>
                            {{-- <td>{{ $v->tanggal_lahir }}</td> --}}
                            <td>{{ \Carbon\Carbon::parse($v->tanggal_lahir)->format('d-m-Y') }}</td>
                            <td>{{ $v->created_at->format('d-m-Y H:i:s') }}</td>
                            <td>
                                <a href="{{ route('registration.view', $v->id) }}" class="btn btn-sm btn-info">View</a>
                                <a href="{{ route('registration.form', $v->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('registration.delete', $v->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus data ini?')"
                                    style="display:inline-block">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-sm btn-danger">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <nav class="mt-3">
        {{-- <div class="d-flex justify-content-center mt-3"> --}}
            {{ $data['Registration']->links('pagination::bootstrap-5') }}
        {{-- </div> --}}
    </nav>
@endsection
