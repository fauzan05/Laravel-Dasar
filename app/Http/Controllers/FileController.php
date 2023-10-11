<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function upload(Request $request):string
    {
        $picture = $request->file('image');
        $picture->storePubliclyAs('images', $picture->getClientOriginalName(), 'public');
        return "OK " . $picture->getClientOriginalName() .
         " has been successfully uploaded";
    }
}
