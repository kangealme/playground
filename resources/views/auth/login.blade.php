<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Bootstrap  --}}
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <script src="vendor/sweetalert/sweetalert.all.js"></script>
    <title>Login</title>
</head>
<body>
    <div class="container h-100">
        <div class="row py-4 h-100">
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <div class="card-header text-center"><strong>Login</strong></div>
                    <div class="card-body">
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
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
                            <div class="mb-3">
                                <button class="btn btn-primary btn-md btn-block w-100">Masuk</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center">
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
