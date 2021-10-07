@extends('layouts.main')

@section('title', 'Sub Menu')

@section('content')

    <div class="container">
        <div class="row mb-2 float-right px-2">
            <a href="{{ route('submenu.add') }}" class="btn btn-sm btn-success"><i class="fas fa-plus mr-2"></i>Tambah</a>
        </div>
        <table class="table table-bordered table-striped table-hover">
            <thead class="thead-dark text-center">
                <tr>
                    <th scope="col">NO</th>
                    <th scope="col">NAMA</th>
                    <th scope="col">ICON</th>
                    <th scope="col">LINK</th>
                    <th scope="col">AKTIV ?</th>
                    {{-- <th scope="col">KETERANGAN</th> --}}
                    <th scope="col">AKSI</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($submenus as $submenu)
                    <tr>
                        <th scope="row" class="text-center">{{ $loop->iteration }}</th>
                        <td>{{ $submenu->name }}</td>
                        <td>{{ $submenu->icon }}</td>
                        <td>{{ $submenu->link }}</td>
                        <td class="text-center">
                            <form
                                action="{{ route('submenu.aktivasi', $submenu->identifier) }}"
                                method="POST"
                                id="is_activeForm{{ $submenu->identifier }}"
                            >
                                @csrf
                                @method('put')
                                    <div class="form-check">
                                        <input
                                            type="checkbox"
                                            name="is_active"
                                            id="is_active{{ $submenu->identifier }}"
                                            class="form-check-input"
                                            @if($submenu->is_active)
                                                checked
                                            @endif
                                            onchange="changeActive('{{ $submenu->identifier }}')"
                                        >
                                    </div>
                            </form>
                        </td>
                        {{-- <td>{{ $submenu->desc }}</td> --}}
                        <td class="text-center">
                            <a
                                href="{{ route('submenu.edit', $submenu->identifier) }}"
                                class="badge rounded-pill bg-warning">
                                    Edit
                            </a>
                            <form
                                action="{{ route('submenu.delete', $submenu->identifier) }}"
                                method="POST"
                                class="d-inline"
                                id="deleteForm">
                                @csrf
                                @method('delete')
                                <button
                                    type="submit"
                                    class="badge rounded-pill bg-danger"
                                    onclick="hapusFormSumit()"
                                    id="btnHapus"
                                >
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

    <script>
        function changeActive(identifier)
        {
            let form = 'is_activeForm' + identifier;
            let is_active = 'is_active'+ identifier;

            document.getElementById(form).submit();
        }

        document.getElementById('btnHapus').addEventListener("click", function(event){
            event.preventDefault();
        });
        function hapusFormSumit()
        {
            document.getElementById('deleteForm').submit();
        }
    </script>
@endsection
