<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CookieController extends Controller
{
    public function createCookie(): Response
    {
        return response("Halo, cookie anda berhasil dibuat")
            ->cookie( "User-1", "001", 1000, '/')
            ->cookie( "User-2", "002", 1000, '/');
    }

    public function getCookie(Request $request): JsonResponse
    {
        return response()
                ->json([
                    'UserCookie1' => $request->cookie('User-1', 'guest'),
                    'UserCookie2' => $request->cookie('User-2', 'guest')
                ]);
    }

    public function clearCookie(): Response
    {
        return response('Clear Cookie Successfully')
            ->withoutCookie('User-1')
            ->withoutCookie('User-2');
    }

}
