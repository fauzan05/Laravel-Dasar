<?php

namespace App\Http\Controllers;

use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class RedirectController extends Controller
{
    public function redirectTo(): string
    {
        return "Ini adalah halaman dari redirect To";
    }

    public function redirectFrom():RedirectResponse
    {
        return redirect('/redirect/to');
    }

    public function redirectName(): RedirectResponse
    {
        return redirect()->route('redirect-hello', ['name' => 'Fauzan Nur Hidayat', 'address' => 'Kebumen']);
    }

    public function redirectHello(string $name, string $address): string
    {
        return "Hello " . $name . " Your Address is : " . $address;
    }

    public function redirectAction(): RedirectResponse
    {
        return redirect()->action([RedirectController::class,
         'redirectHello'], ['name' => 'Fauzan', 'address' => 'Kebumen']);
    }

    public function redirectAway(): RedirectResponse
    {
        return redirect()->away('https://www.google.com');
    }

    public function currentRoute(Request $request): JsonResponse
    {
        // to knowing current named routes 
        return response()->json([
            'Your Address' => $request->route()->named('redirect-current')
        ]);
    }

}
