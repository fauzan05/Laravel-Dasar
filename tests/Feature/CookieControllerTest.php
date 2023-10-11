<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CookieControllerTest extends TestCase
{
    public function testCreateCookie()
    {
        $this->get('/cookie/set')
            ->assertCookie('User-1', "001")
            ->assertCookie('User-2', "002");
    }

    public function testGetCookie()
    {
        $this->withCookie('User-1', '001')
            ->withCookie('User-2', '002')
            ->get('/cookie/get')
            ->assertJson([
                'UserCookie1' => '001',
                'UserCookie2' => '002',
            ]);
    }
}
