<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Login Admin | Sekolah Happy Holy Kids</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        body {
            background: linear-gradient(135deg, #3b82f6, #60a5fa);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-card {
            border-radius: 20px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, .15);
        }

        .school-title {
            font-weight: 700;
            color: #2563eb;
        }
    </style>
</head>

<body>

    {{-- @push('scripts') --}}
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
    {{-- @endpush --}}

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">

                <div class="card login-card p-4">
                    <div class="text-center mb-4">
                        <i class="bi bi-mortarboard-fill fs-1 text-primary"></i>
                        <h4 class="mt-2 school-title">Admin Sekolah</h4>
                        <p class="text-muted mb-0">Happy Holy Kids</p>
                    </div>

                    <form action="{{ route('login.store') }}" method="POST">
                        @csrf
                        <!-- Email -->
                        <div class="mb-3">
                            <label class="form-label">Email Admin</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-envelope"></i>
                                </span>
                                <input name="email" type="email" class="form-control" placeholder="admin@sekolah.com" required>
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-lock-fill"></i>
                                </span>
                                <input name="password" type="password" class="form-control" placeholder="********" required>
                            </div>
                        </div>

                        <!-- Button -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="bi bi-box-arrow-in-right"></i> Login
                            </button>
                        </div>
                    </form>

                    <div class="text-center mt-4">
                        <small class="text-muted">
                            © {{ date('Y') }} Sekolah Happy Holy Kids
                        </small>
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>

</html>