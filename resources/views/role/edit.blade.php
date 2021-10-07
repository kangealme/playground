@extends('layouts.main')

@section('title', 'Edit Role')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered table-striped table-hover">
                            <thead class="thead-dark text-center">
                                <tr>
                                    <th scope="col">NO</th>
                                    <th scope="col">NAMA ROLE</th>
                                    <th scope="col">UBAH NAMA</th>
                                    <th scope="col">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role)
                                    <form action="{{ route('role.update') }}" method="POST">
                                        @csrf
                                        @method('put')

                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>
                                                <input type="hidden" name="id" name="id" value="{{ $role->id }}">
                                                <input
                                                    type="text"
                                                    name="name"
                                                    id="name"
                                                    class="form-control @error('name')
                                                        is-invalid
                                                    @enderror"
                                                    value="{{ $role->name }}"
                                                >
                                                @error('name')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </td>
                                            <td>
                                                <input type="text" name="desc" id="desc" class="form-control" value="{{ $role->desc }}">
                                            </td>
                                            <td class="text-center">
                                                <button class="btn btn-sm btn-success">Ubah</button>
                                            </td>
                                        </tr>

                                    </form>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
