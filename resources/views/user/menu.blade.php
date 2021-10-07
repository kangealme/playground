@extends('layouts.main')

@section('title','Menu Viewer')

@section('content')
    <div class="container">
          <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-2 text-center">
                    <img
                        src="/assets/images/pengguna/{{ $pengguna->photo }}"
                        class="img-fluid rounded-start p-2 align-items-center"
                        alt="{{ $pengguna->username }}"
                    >
                </div>
                <div class="col-md-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-center">
                            <h3 class="card-title font-weight-bold">{{ $pengguna->name }}</h3>
                        </div>
                        <br>
                        <hr>
                        <p class="card-text">{{ $pengguna->username }}
                            <small class="text-muted"> - Username</small>
                        </p>
                        <p class="card-text">{{ $pengguna->email }}
                            <small class="text-muted"> - Email</small>
                        </p>
                        <p class="card-text">{{ $pengguna->phone }}
                            <small class="text-muted"> - Telp</small>
                        </p>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="card-body">
                        <div class="d-flex justify-content-center align-items-center">
                            <h3 class="card-title font-weight-bold">Role</h3>
                        </div>
                        <br>
                        <hr>
                        <ul>
                            <li>{{ $pengguna->role->name }}</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-center">
                            <h3 class="card-title font-weight-bold">Menu</h3>
                        </div>
                        <br>
                        <hr>
                        <ul>
                            @foreach ($pengguna->role->menus as $menu)
                                <li>{{ $menu->name }}</li>
                                <ol>
                                    @foreach ($menu->submenus as $submenu)
                                        <li>{{ $submenu->name }}</li>
                                    @endforeach
                                </ol>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row g-0 my-2">
                <div class="col-md-2">
                </div>
                <div class="col-md-8">
                    <div class="card-footer">
                        <hr>
                        tes
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
