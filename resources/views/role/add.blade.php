@extends('layouts.main')

@section('title', 'Add Role')

@section('content')
    <div class="container">
        <div class="row p-2">
            <div class="col-md-12">
                <form action="{{ route('role.add') }}" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="col-md-4">
                                    <label for="name" class="form-label">Nama Role</label>
                                    <input
                                        type="text"
                                        name="name"
                                        id="name"
                                        class="form-control @error('name')
                                            is-invalid
                                        @enderror"
                                        placeholder="Nama Role"
                                        autofocus
                                    />
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-8">
                                    <label for="desc" class="form-label">Keterangan</label>
                                    <input
                                        type="text"
                                        name="desc"
                                        id="desc"
                                        class="form-control"
                                        placeholder="Keterangan"
                                    />
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="float-right">
                                <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
