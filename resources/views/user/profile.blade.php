@extends('layouts.main')

@section('title','Profile')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                    <img src="/assets/images/pengguna/{{ $pengguna->photo }}" class="img-fluid rounded-start" alt="{{ $pengguna->username }}">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{ $pengguna->name }}</h5>
                            <p class="card-text">{{ $pengguna->username }} <small>- username</small></p>
                            <p class="card-text">{{ $pengguna->email }} <small>- email</small></p>
                            <p class="card-text">{{ $pengguna->phone }} <small>- Telepon</small></p>
                            <p class="card-text">{{ $pengguna->address }} <small>- Alamat</small></p>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('user.edit', $pengguna->username) }}" class="btn btn-warning">Edit Profile</a>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection
