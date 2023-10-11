<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function createSession(Request $request): string
    {
        // session()
        $request->session()->put('UserId', '001');
        $request->session()->put('Role', 'Admin');
        return "OK";
    }

    public function getSession(Request $request): string
    {
        $userId = $request->session()->get('UserId')?? "Guest";
        $role = $request->session()->get('Role')?? "Guest";

        return "User Id : $userId " . "Role : " . $role;

    }
}
