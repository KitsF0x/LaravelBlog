<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function panel() {
        return view('admin.panel');
    }

    public function users() {
        return view('admin.users', [
            "users" => User::all()
        ]);
    }
}
