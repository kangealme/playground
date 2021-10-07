<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('home', compact('user'));
    }

    public function dashboardSatu()
    {
        $user = Auth::user();

        request()->session()->flash('activeMenu', 'Dashboard');
        return view('dashboard.dashboardSatu', compact('user'));
    }

    public function dashboardDua()
    {
        $user = Auth::user();

        request()->session()->flash('activeMenu', 'Dashboard');
        return view('dashboard.dashboardDua', compact('user'));
    }
}
