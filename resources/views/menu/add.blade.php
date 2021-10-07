@extends('layouts.main')

@section('title', 'Tambah Menu')

@section('content')
    <div class="container">
        <div class="card">
            <form action="{{ route('menu.save') }}" method="POST">
                @csrf

                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="role_id" class="form-label"><strong>Role Id</strong></label>
                                <select name="role_id" id="role_id" class="form-control">
                                    <option>-- Pilih Role --</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="name" class="form-label"><strong>Nama Menu</strong></label>
                                <input
                                    type="text"
                                    name="name"
                                    id="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    placeholder="Nama Menu"
                                    value="{{ old('name') }}"
                                />
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $messages }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="icon" class="form-label"><strong>Icon</strong></label>
                                <input
                                    type="text"
                                    name="icon"
                                    id="icon"
                                    class="form-control @error('icon') is-invalid @enderror"
                                    placeholder="Icon FA"
                                    value="{{ old('icon') }}"
                                />
                                @error('icon')
                                    <div class="invalid-feedback">
                                        {{ $messages }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="link" class="form-label"><strong>Link</strong></label>
                                <input
                                    type="text"
                                    name="link"
                                    id="link"
                                    class="form-control @error('link') is-invalid @enderror"
                                    placeholder="Masukkan Link"
                                    value="{{ old('link') }}"
                                />
                                @error('link')
                                    <div class="invalid-feedback">
                                        {{ $messages }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="desc" class="form-label"><strong>Keterangan</strong></label>
                        <textarea
                            name="desc"
                            id="desc"
                            rows="3"
                            class="form-control"
                            placeholder="Keterangan"
                        >
                            {{ old('desc') }}
                        </textarea>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-sm btn-success float-right">
                        <i class="fas fa-save mr-2"></i>
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
