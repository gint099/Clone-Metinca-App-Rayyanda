<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function dashboard()
{
    $views = [
        'admin' => 'admin.dashboard',
        'quality-checker' => 'checker.dashboard',
        'pic' => 'pic.dashboard',
    ];

    $role = auth()->user()->role;

    if (!isset($views[$role])) {
        abort(403, 'Role tidak dikenal');
    }

    return view($views[$role]);
}


}
