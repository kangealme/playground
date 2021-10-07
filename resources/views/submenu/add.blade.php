@extends('layouts.main')

@section('title', 'Tambah Sub Menu')

@section('content')
    <div class="container">
        <div class="row mb-3">
            <div class="col-md-12">
                <div class="card">
                    <form action="{{ route('submenu.save') }}" method="post">
                        @csrf
                        @method('post')
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name" class="form-label">Name</label>
                                        <input
                                            type="text"
                                            name="name"
                                            id="name"
                                            class="form-control @error('name')
                                                is-invalid
                                            @enderror"
                                            value="{{ old('name') }}"
                                            placeholder="Nama Submenu"
                                        >
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="icon" class="form-label">Icon</label>
                                        <input
                                            type="text"
                                            name="icon"
                                            id="icon"
                                            class="form-control @error('icon')
                                                is-invalid
                                            @enderror"
                                            value="{{ old('icon') }}"
                                            placeholder="icon"
                                        >
                                        @error('icon')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="link" class="form-label">Link</label>
                                        <input
                                            type="text"
                                            name="link"
                                            id="link"
                                            class="form-control @error('link')
                                                is-invalid
                                            @enderror"
                                            value="{{ old('link') }}"
                                            placeholder="Link"
                                        >
                                        @error('link')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="menu_id" class="form-label">Menu Id</label>
                                        <select name="menu_id" id="menu_id" class="form-control">
                                            <option>-- Pilih Menu --</option>
                                            @foreach ($menus as $menu)
                                                <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="desc" class="form-label">Keterangan</label>
                                        <textarea
                                            name="desc"
                                            id="desc"
                                            cols="6" rows="3"
                                            class="form-control"
                                            placeholder="Keterangan"
                                        ></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer float-right">
                            <button type="submit" class="btn btn-md btn-success"><i class="fas fa-save mr-2"></i>Simpan</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
