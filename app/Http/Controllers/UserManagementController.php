<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserManagementController extends Controller
{
    public function changeBanStatus(int $id) {
        $user = User::findOrFail($id);
        if($user->isBanned == true) {
            $user->isBanned = false;
        }
        else {
            $user->isBanned = true;
        }
        $user->save();
        return redirect(route("admin.users"));
    }
}
