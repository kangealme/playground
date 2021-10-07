@extends('layouts.main')

@section('title', 'Daftar Pengguna')

@section('content')
    <script>
        function activeChanger(username)
        {
            formSelected = 'changeActiveForm' + username;
            checkboxSelected = 'is_active' + username;

            // if(document.getElementById(checkboxSelected).checked == true)
            // {
            //     document.getElementById("is_active").value = 1;
            // }else{
            //     document.getElementById("is_active").value = 0;
            // }

            document.getElementById(formSelected).submit();
        }
    </script>
    <div class="container">
        <div class="row">
            <div class="col-md-8 d-flex">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="table-dark text-center">
                        <tr>
                            <th scope="col">NO</th>
                            <th scope="col">NAMA</th>
                            <th scope="col">USERNAME</th>
                            <th scope="col">EMAIL</th>
                            <th scope="col">TELEPON</th>
                            <th scope="col">AKTIV</th>
                            <th scope="col">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $item)
                            <tr class="text-nowrap">
                                <th scope="col">{{ $loop->iteration }}</th>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->username }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->phone }}</td>
                                <td class="text-center">
                                    <form
                                        action="{{ route('user.is_active', $item->username) }}"
                                        method="POST"
                                        id="changeActiveForm{{ $item->username }}"
                                    >
                                        @csrf
                                        @method('put')

                                        <div class="form-check">
                                            <input
                                                type="checkbox"
                                                class="form-check-input"
                                                name="is_active{{ $item->username }}"
                                                id="is_active{{ $item->username }}"
                                                @if($item->is_active == 1)
                                                    checked
                                                @endif
                                                @if($item->username == $user->username)
                                                    disabled
                                                @endif
                                                onchange="activeChanger('{{ $item->username }}')"
                                            >
                                        </div>
                                    </form>
                                </td>
                                <td class="text-center d-inline-flex">
                                    <div class="mr-2">
                                        <a href="{{ route('user.edit', $item->username) }}">
                                            <span class="badge rounded-pill bg-warning">
                                                Edit
                                            </span>
                                        </a>
                                    </div>
                                    <div class="mr-2">
                                        <form
                                            action="{{ route('user.del', $item->username) }}" method="POST"
                                            class="d-inline"
                                            id="formHapus"
                                        >
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="badge rounded-pill bg-danger">Hapus</button>
                                        </form>
                                    </div>
                                    <div class="mr-2">
                                        <a
                                            href="{{ route('user.menu', $item->username) }}">
                                            <span class="badge rounded-pill bg-success">
                                                Menu
                                            </span>
                                        </a>
                                    </div>
                                    <div class="mr-2">
                                        <a href="{{ route('user.role', $item->username) }}">
                                            <span class="badge rounded-pill bg-secondary">
                                                Role
                                            </span>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
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
@endsection
