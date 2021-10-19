@extends('layouts.main')

@section('title', 'Edit Pengguna')

@section('content')
    <script>
        var photoPrev = function(event) {
            var output = document.getElementById('photoPreview');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
            }
        };
    </script>

    <div class="container">
        <form action="{{ route('user.update', $pengguna->username) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-4 text-center mx-auto p-2">
                        <img src="/assets/images/pengguna/{{ $pengguna->photo }}" class="img-fluid rounded-start img-thumbnail" id="photoPreview" alt="...">
                        <div class="my-2 px-2">
                            <input type="file" name="photo" id="photo" accept="image/*" onchange="photoPrev(event)" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="row px-2 mb-2">
                            <div class="col-md-6 my-2">
                                <input
                                    type="text"
                                    name="name"
                                    id="name"
                                    class="form-control @error('name') is-invalid  @enderror"
                                    placeholder="Nama"
                                    value="{{ $pengguna->name ?? old('name') }}"
                                >
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6 my-2">
                                <input
                                    type="text"
                                    name="username"
                                    id="username"
                                    class="form-control @error('username') is-invalid  @enderror"
                                    placeholder="USername"
                                    value="{{ $pengguna->username ?? old('username') }}"
                                >
                                @error('username')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row p-2 mb-2">
                            <div class="col-md-6 my-2">
                                <input
                                    type="email"
                                    name="email"
                                    id="email"
                                    class="form-control @error('email') is-invalid  @enderror"
                                    placeholder="Email"
                                    value="{{ $pengguna->email ?? old('email') }}"
                                >
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6 my-2">
                                <input
                                    type="password"
                                    name="password"
                                    id="password"
                                    class="form-control @error('password') is-invalid  @enderror"
                                    value="{{ $pengguna->password ?? old('password') }}"
                                    placeholder="Password"
                                >
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row p-2 mb-2">
                            <div class="col-md-8 my-2">
                                <input
                                    type="text"
                                    name="address"
                                    id="address"
                                    class="form-control @error('address') is-invalid  @enderror"
                                    placeholder="address"
                                    value="{{ $pengguna->address ?? old('address') }}"
                                >
                                @error('address')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-4 my-2">
                                <input
                                    type="text"
                                    name="phone"
                                    id="phone"
                                    class="form-control @error('phone') is-invalid  @enderror"
                                    placeholder="phone"
                                    value="{{ $pengguna->phone ?? old('phone') }}"
                                >
                                @error('phone')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row p-2 mb-2 d-flex justify-content-center align-items-center">
                            <div class="col-md-2">
                                <div class="form-check">
                                    @if ($pengguna->is_active)
                                        <input
                                            type="checkbox"
                                            class="form-check-input"
                                            name="is_active" id="is_active" checked
                                        >
                                        <label
                                            for="is_active"
                                            class="form-check-label">is active ?
                                        </label>
                                    @else
                                           <input
                                            type="checkbox"
                                            class="form-check-input"
                                            name="is_active" id="is_active"
                                        >
                                        <label
                                            for="is_active"
                                            class="form-check-label">is active ?
                                        </label>
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex float-right">
                <button class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
@endsection
