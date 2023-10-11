<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class URLGenerationTest extends TestCase
{
    public function testURLCurrent()
    {
        $this->get('/url/current')
            ->assertSeeText('http://localhost/url/current');
    }

    public function testNamed()
    {
        $this->get('/redirect/named')
            ->assertSeeText('http://localhost/redirect/name/fauzan/address/kebumen');
    }

    public function testAction()
    {
        $this->get('/url/action')
            ->assertSeeText('http://localhost/form');
    }
}
