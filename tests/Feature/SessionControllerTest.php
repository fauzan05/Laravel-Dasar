<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SessionControllerTest extends TestCase
{
    public function testCreateSession()
    {
        $this->get('/session/create')
            ->assertSeeText('OK')
            ->assertSessionHas('UserId', '001')
            ->assertSessionHas('Role', 'Admin');
    }

    public function testGetSession()
    {
        $this->withSession([
            'UserId' => '001',
            'Role' => 'Admin'
        ])->get('/session/get')
            ->assertSeeText('User Id : 001 Role : Admin');
    }

    public function testGetSessionGuest()
    {
        $this->withSession([])
            ->get('/session/get')
            ->assertSeeText('User Id : Guest Role : Guest');
    }
}
