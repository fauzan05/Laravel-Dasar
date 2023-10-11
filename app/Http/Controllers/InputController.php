<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InputController extends Controller
{
    public function hello(Request $request):string
    {
        $name = $request->input('name');
        return "Hello, Your name is : " . $name;
    }

    public function helloFirstname(Request $request):string
    {
        $firstname = $request->input('name.first');
        return "Hello " . $firstname;
    }

    public function helloInput(Request $request):string
    {
        $input = $request->input();
        return json_encode($input);
    }

    public function helloArray(Request $request):string
    {
        $names = $request->input('people.*.firstname');
        return json_encode($names);
    }

    public function inputType(Request $request):string
    {
        $name = $request->input('name');
        $married = $request->boolean('married');
        $birthDate = $request->date('birth_date', 'Y-m-d');
        return json_encode([
            'name' => $name,
            'married' => $married,
            'birthDate' => $birthDate->format('Y-m-d')
        ]);
    }

    public function filterOnly(Request $request):string
    {
        $name = $request->only(['name.first', 'name.last']);
        return json_encode($name);
    }

    public function filterExcept(Request $request):string
    {
        $user = $request->except('role.admin');
        return json_encode($user);   
    }

    public function filterMerge(Request $request):string
    {
        $user = $request->merge([
            'admin' => 'false'
        ])->input();
        return json_encode($user);
    }
}
