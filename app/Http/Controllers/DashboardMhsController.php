<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardMhsController extends Controller
{
    public function index()
    {
        return view("pages.role_mahasiswa.dashboard.index");
    }
}
