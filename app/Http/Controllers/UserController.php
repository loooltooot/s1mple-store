<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function makeAdmin(Request $request, User $user)
    {
        $user->admin = 1;
        $user->save();
    }

    public function delete(User $user)
    {
        $user->delete();
    }
}
