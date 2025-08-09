<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('pages.dashboard');
    }
}
