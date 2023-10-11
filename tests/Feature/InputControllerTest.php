<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InputControllerTest extends TestCase
{

    public function testInput()
    {
        $this->get('/input/hello?name=Fauzan')->assertSeeText('Hello, Your name is : Fauzan');
        $this->post('/input/hello', ['name' => 'Fauzan'])->assertSeeText('Hello, Your name is : Fauzan');
    }

    public function testInputNested()
    {
        $this->post('/input/hello/first', [
            'name' => [
                'first' => 'fauzan',
                'last' => 'nurhidayat'
            ]
        ])->assertSeeText('Hello fauzan');
    }

    public function testInputAll()
    {
        $this->post('/input/hello/input', [
            'name' => [
                'first' => 'fauzan',
                'last' => 'nurhidayat'
            ]
        ])->assertSeeText('name')->assertSeeText('first')
            ->assertSeeText('last')->assertSeeText('fauzan')
            ->assertSeeText('nurhidayat');
    }

    public function testInputArray()
    {
        $this->post('input/hello/array', [
            'people' => [
            [
                'firstname' => 'fauzan'
            ],
            [
                'firstname' => 'elang'
            ],
            [
                'firstname' => 'susi'
            ]
            ]
        ])->assertSeeText('fauzan')
            ->assertSeeText('elang')
            ->assertSeeText('susi');
    }
    
    public function testInputType()
    {
        $this->post('/input/type', [
            'name' => 'Fauzan',
            'married' => 'true',
            'birthDate' => '2001-02-05'
        ])->assertSeeText('Fauzan')
            ->assertSeeText('true')
            ->assertSeeText('2001-02-05')
            ;
    }

    public function testFilterOnly()
    {
        $this->post('/input/filter/only', [
            "name" => [
                'first' => 'fauzan',
                'middle' => 'nur',
                'last' => 'hidayat'
            ]
        ])->assertSeeText('fauzan')->assertSeeText('hidayat');
    }

    public function testFilterExcept()
    {
        $this->post('/input/filter/except', [
            "role" => [
                'admin' => 'ini adalah admin',
                'user' => 'ini adalah user',
                'guest' => 'ini adalah guest'
            ]
        ])->assertSeeText('ini adalah user')->assertSeeText('ini adalah guest');
    }

    public function testFilterMerge()
    {
        $this->post('/input/filter/merge', [
            'username' => 'admin',
            'password' => 'admin',
            'admin' => 'true'
        ])->assertSeeText('false');
    }
}
