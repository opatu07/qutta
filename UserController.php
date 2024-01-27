<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class UserController extends Controller
{
    public function withdrawal()
    {
        $user = Auth::user();
        $user->delete();
        Auth::logout();
        return redirect(route('login'));
    }

    public function destroy(User $user)
    {

    }
}
