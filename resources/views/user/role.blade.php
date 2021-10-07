@extends('layouts.main')

@section('title', 'Role Pengguna')

@section('content')
    <div class="container">
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-2">
                    <img
                        src="/assets/images/pengguna/{{ $pengguna->photo }}"
                        class="img-fluid rounded-start p-2 align-items-center"
                        alt="{{ $pengguna->username }}"
                    >
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{ $pengguna->name }}</h5>
                        <h6
                            class="card-text">{{ $pengguna->username }} <small> - username</small>
                        </h6>
                        <h6
                            class="card-text">{{ $pengguna->role->name ?? 'Belum ada' }}
                                <small> - role</small>
                        </h6>
                        <p class="card-text">
                            <form
                                action="{{ route('user.addRole', $pengguna->username) }}" id="formAddRole"
                                method="post"
                            >
                                @csrf
                                @foreach ($roles as $role)
                                    <div class="form-check form-check-inline">
                                        <input
                                            type="radio"
                                            name="role"
                                            id="role{{ $role->name }}"
                                            class="form-check-input"
                                            value="{{ $role->name }}"
                                            onclick="getElementById('formAddRole').submit()"
                                            @if ($role->name == $pengguna->role->name)
                                                checked
                                            @endif
                                        >
                                        <label
                                            for="role{{ $role->name }}"
                                            class="form-check-label">{{ $role->name }}
                                        </label>
                                    </div>
                                @endforeach
                            </form>
                        </p>


                        <p class="card-text"><small class="text-muted">Last updated {{ $pengguna->updated_at->diffForHumans() }}</small></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
