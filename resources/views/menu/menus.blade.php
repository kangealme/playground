@extends('layouts.main')

@section('title','Daftar Menu')

@section('content')
    <div class="container">
        <div class="row mb-3 float-right px-2">
            {{-- <a
                href="{{ route('menu.add') }}"
                class="btn btn-sm btn-success"><i class="fas fa-plus mr-2"></i>Tambah</a> --}}
            <button
                type="button"
                class="btn btn-sm btn-success"
                data-toggle="modal"
                data-target="#addMenuModal"
            >
                    <i
                    class="fas fa-plus mr-2"
                   >
                </i>Tambah
            </button>
            {{-- <a href="{{ route('menu.add') }}" class="btn btn-sm btn-success">
                <i class="fas fa-plus mr2"></i>
                Tambah
            </a> --}}
        </div>
        <table class="table table-bordered table-striped table-hover">
            <thead class="thead-dark text-center">
                <tr>
                    <th scope="col">NO</th>
                    <th scope="col">ROLE ID</th>
                    <th scope="col">NAME</th>
                    <th scope="col" colspan="2">ICON</th>
                    <th scope="col">LINK</th>
                    <th scope="col">KETERANGAN</th>
                    <th scope="col">AKSI</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($menus as $menu)
                    <tr>
                        <th scope="row" class="text-center">{{ $loop->iteration }}</th>
                        <td>{{ $menu->role_id }}</td>
                        <td>{{ $menu->name }}</td>
                        <td>{{ $menu->icon }}</td>
                        <td class="text-center"><i class="{{ $menu->icon }}"></i></td>
                        <td>{{ $menu->link }}</td>
                        <td>{{ $menu->desc }}</td>
                        <td style="min-width: 90px">
                            <a href="{{ route('menu.edit', $menu->identifier) }}" class="badge rounded-pill bg-warning">Edit</a>
                            <form
                                action="{{ route('menu.delete', $menu->identifier) }}" method="POST"
                                class="d-inline"
                            >
                                @csrf
                                @method('delete')

                                <button type="submit" class="badge rounded-pill bg-danger">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


  <!-- Modal -->
    <div
        class="modal fade"
        id="addMenuModal"
        tabindex="-1"
        aria-labelledby="addMenuModalLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="{{ route('menu.save') }}" method="POST">
                    @csrf

                    <div class="modal-header">
                        <h5 class="modal-title" id="addMenuModalLabel"><strong>Tambah Menu</strong></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label
                                            for="role"
                                            class="form-label">
                                                <strong>Role</strong>
                                        </label>
                                        <select name="role" id="role" class="form-control">
                                            <option>-- Pilih Role --</option>
                                            @foreach ($roles as $role)
                                                <option
                                                    value="{{ $role->id }}">
                                                    {{ $role->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
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
                                            placeholder="Nama Menu"
                                        />
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $messages }}
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
                                            placeholder="Icon FA"
                                            class="form-control @error('icon')
                                                is-invalid
                                            @enderror"
                                        />
                                        @error('icon')
                                            <div class="invalid-feedback">
                                                {{ $messages }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="link" class="form-label">Link</label>
                                        <input
                                            type="text"
                                            name="link"
                                            id="link"
                                            placeholder="Link"
                                            class="form-control @error('link')
                                                is-invalid
                                            @enderror"
                                        />
                                        @error('link')
                                            <div class="invalid-feedback">
                                                {{ $messages }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="desc" class="form-label">Keterangan</label>
                                        <input
                                            type="text"
                                            name="desc"
                                            id="desc"
                                            placeholder="Keterangan"
                                            class="form-control @error('desc')
                                                is-invalid
                                            @enderror"
                                        />
                                        @error('desc')
                                            <div class="invalid-feedback">
                                                {{ $messages }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button
                            type="button"
                            class="btn btn-secondary"
                            data-dismiss="modal"
                        >
                            Batal
                        </button>
                        <button type="button" class="btn btn-primary btn-simpan">
                            <i class="fas fa-save mr-2"></i>Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="mb-3">
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
@endsection
