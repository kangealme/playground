@extends('layouts.main')

@section('title', 'Halaman Home')

@section('content')
    <div class="container">
        <div class="row text-center font-weight-bold">
            <div class="col-md-3">
                USER
            </div>
            <div class="col-md-3">
                ROLE
            </div>
            <div class="col-md-3">
                MENU
            </div>
            <div class="col-md-3">
                SUBMENU
            </div>
        </div>
        <div class="row my-2 text-center">
            <div class="col-md-3">
               {{ $user->name }}
            </div>
            <div class="col-md-3">
                {{ $user->role->name }}
            </div>
            <div class="col-md-3">
                <ul>
                    @foreach ($user->role->menus as $menu)
                        <li>{{ $menu->name }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-3">
                <ul>
                    @foreach ($user->role->menus as $menu)
                        <li>
                            {{ $menu->name }}
                            <ol>
                                @foreach ($menu->submenus as $submenu)
                                    <li>
                                        {{ $submenu->name }}
                                    </li>
                                @endforeach
                            </ol>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection

@section('footer','Copyright 2021')
