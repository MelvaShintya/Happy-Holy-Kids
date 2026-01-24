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
    <!-- STAT CARDS -->
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card p-3">
                <h6>Total Pendaftar</h6>
                <h3>{{ $data['Count'] }}</h3>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-3">
                <h6>Pendaftar 7 Hari Terakhir</h6>
                <h3>{{ $data['subDays'] }}</h3>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-3">
                <h6>Pendaftar Hari Ini</h6>
                <h3>{{ $data['WhereDate'] }}</h3>
            </div>
        </div>
    </div>

    <!-- CHART -->
    {{-- <div class="card p-4 mb-4">
        <h5 class="mb-3">Pengunjung Website per Tahun</h5>
        <canvas id="chartPengunjungTahunan" height="120"></canvas>
    </div>

    <div class="card p-4 mb-4">
        <h5 class="mb-3">Distribusi Pendaftaran 7 Hari Terakhir</h5>

        <div class="chart-wrapper">
            <canvas id="chartPendaftaran"></canvas>
        </div>
    </div>
 --}}


    <!-- TABLE -->
    <div class="card p-4">
        <h5 class="mb-3">Data Pendaftar Terbaru</h5>

        <div class="table-responsive">
            <table class="table table-bordered align-middle">
                <thead class="table-primary">
                    <tr>
                        <th>No</th>
                        <th>Nama Lengkap Siswa</th>
                        <th>Jenis Kelamin</th>
                        <th>Tanggal Lahir</th>
                        <th>Tanggal Daftar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data['Registration'] as $i => $v ) 
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $v->nama_siswa }}</td>
                            <td>{{ $v->jenis_kelamin }}</td>
                            {{-- <td>{{ $v->tanggal_lahir }}</td> --}}
                            <td>{{ \Carbon\Carbon::parse($v->tanggal_lahir)->format('d-m-Y') }}</td>
                            <td>{{ $v->created_at->format('d-m-Y H:i:s') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

    <!-- CHART SCRIPT -->
    <script>
        new Chart(document.getElementById('chartPendaftaran'), {
            type: 'doughnut',
            data: {
                labels: ['11 Jan', '12 Jan', '13 Jan', '14 Jan', '15 Jan', '16 Jan', '17 Jan'],
                datasets: [{
                    data: [3, 4, 5, 6, 4, 2, 5],
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false, // 🔥 INI KUNCINYA
                cutout: '65%',
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });
    </script>
    <script>
        const ctxPengunjung = document.getElementById('chartPengunjungTahunan');

        new Chart(ctxPengunjung, {
            type: 'bar',
            data: {
                labels: ['2020', '2021', '2022', '2023', '2024', '2025'],
                datasets: [{
                    label: 'Jumlah Pengunjung',
                    data: [1200, 1850, 2400, 3100, 4200, 5300],
                    borderWidth: 1,
                    borderRadius: 8
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return `${context.raw.toLocaleString()} pengunjung`;
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return value.toLocaleString();
                            }
                        }
                    }
                }
            }
        });
    </script>
@endsection
