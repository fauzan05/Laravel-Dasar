<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ResponseController extends Controller
{
    public function response(): Response
    {
        return response('Halo, Ini adalah response', 200);
    }

    public function header(): Response
    {
        $body = ['firstname' => 'Fauzan', 'lastname' => 'Nur Hidayat'];
        return response(json_encode($body), 200)
            ->header('content-type', 'application/json')
            ->withHeaders([
                'Author' => 'Fauzan Nur Hidayat',
                'App' => 'Belajar Laravel'
            ]);
    }

    public function responseView(): Response
    {
        return response()
            ->view('hello', ['name' => 'Fauzan']);
    }

    public function responseJson(): JsonResponse
    {
        $body = ['firstname' => 'fauzan', 'lastname' => 'nur hidayat'];
        return response()
            ->json($body);
    }
    
    public function responseFile(): BinaryFileResponse
    {
        return response()
            ->file(storage_path('app/public/images/image1.jpg'), ['Name' => 'image1.jpg']);
    }

    public function responseDownload(): BinaryFileResponse
    {
        return response()
            ->download(storage_path('app/public/images/image1.jpg'), 'image1.jpg');
    }
}
