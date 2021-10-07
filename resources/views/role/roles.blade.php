@extends('layouts.main')

@section('title', 'Roles')

@section('content')
    <div class="container">
        <div class="row mb-3 float-right px-2">
            <a href="{{ route('role.add') }}" class="btn btn-sm btn-success"><span class="fas fa-plus mr-2"></span>Tambah</a>
        </div>
        <table class="table table-bordered table-striped table-hover">
            <thead class="table-dark text-center">
                <tr>
                    <th scope="col">NO</th>
                    <th scope="col">NAMA ROLE</th>
                    <th scope="col">KETERANGAN</th>
                    <th scope="col">AKSI</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $role->name }}</td>
                        <td>{{ $role->desc }}</td>
                        <td class="text-center">
                            <a
                                href="{{ route('role.edit', $role->identifier) }}"
                                class="badge rounded-pill bg-warning mr-2">
                                    Edit
                            </a>
                            <form
                                action="{{ route('role.del', $role->identifier) }}"
                                method="post" class="d-inline"
                            >
                                @csrf
                                @method('delete')
                                <button
                                    type="submit"
                                    class="badge rounded-pill bg-danger">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
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
    </div>
@endsection
