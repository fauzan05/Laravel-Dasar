<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ContohMiddlewareTest extends TestCase
{
    public function testMiddlewareInvalid()
    {
        $this->get('/middleware/api')
            ->assertStatus(401)
            ->assertSeeText('Access Denied');
    }

    public function testMiddlewareValid()
    {
        $this->withHeader('X-API-KEY', 'FZN')
            ->get('/middleware/api')
            ->assertStatus(302)
            ->assertRedirect('/redirect/name/Fauzan/address/Kebumen');
    }
    public function testMiddlewareInvalidGroup()
    {
        $this->get('/middleware/group')
            ->assertStatus(401)
            ->assertSeeText('Access Denied');
    }

    public function testMiddlewareValidGroup()
    {
        $this->withHeader('X-API-KEY', 'FZN')
            ->get('/middleware/group')
            ->assertStatus(302)
            ->assertRedirect('/redirect/name/Fauzan/address/Kebumen');
    }

    
}
