<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Bootstrap  --}}
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <script src="vendor/sweetalert/sweetalert.all.js"></script>
    <title>Register</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-6 mx-auto">
                <div class="card bg-light mt-2 px-3 py-2">
                    <div class="card-header text-center bg-light"><strong>Register</strong></div>
                    <div class="card-body">
                        <form action="{{ route('register') }}" method="POST">
                            @csrf
                            <div class="my-3">
                                <label for="name" class="form-label">Nama</label>
                                <input
                                    type="text"
                                    name="name"
                                    id="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    placeholder="Nama"
                                    value="{{ old('name') }}"
                                />
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="my-3">
                                <label for="username" class="form-label">Username</label>
                                <input
                                    type="text"
                                    name="username"
                                    id="username"
                                    class="form-control
                                        @error('username') is-invalid @enderror"
                                    placeholder="Username"
                                    value="{{ old('username') }}"
                                    >
                                @error('username')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="my-3">
                                <label for="email" class="form-label">Email</label>
                                <input
                                    type="email"
                                    name="email"
                                    id="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    placeholder="email"
                                    value="{{ old('email') }}"
                                />
                                @error('email')
                                    <div class="is-invalid">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="my-3">
                                <label for="password" class="form-label">Password</label>
                                <input
                                    type="password"
                                    name="password"
                                    id="password"
                                    class="form-control
                                        @error('password') is-invalid @enderror
                                    ">
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="my-3">
                                <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                                <input
                                    type="password"
                                    name="password_confirmation"
                                    id="password_confirmation"
                                    class="form-control @error('password_confirmation') is-invalid @enderror"
                                />
                                @error('password_confirmation')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary btn-md btn-block w-100">Daftarkan</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center bg-light">
                        <div class="col-md-12">
                            <p class="text-center mb-0 text-muted"><small>Sudah Punya Akun ? <a href="{{ route('login') }}">Login</a></small></p>
                        </div>
                        @if (Session::get('pesan'))
                            <script>
                                const title = "{{ Session::get('pesan')['title'] }}";
                                const text = "{{ Session::get('pesan')['text'] }}";
                                const icon = "{{ Session::get('pesan')['icon'] }}";

                                Swal.fire({
                                    title,
                                    text,
                                    icon
                                });
                            </script>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></>
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
