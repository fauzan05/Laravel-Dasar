<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ResponseControllerTest extends TestCase
{
        public function testResponse()
        {
            $this->get('/response/hello')
                ->assertStatus(200)
                ->assertSeeText('Halo, Ini adalah response');
        }

        public function testHeader()
        {
            $this->get('/response/header')
                ->assertStatus(200)
                ->assertJson(['firstname' => 'Fauzan', 'lastname' => 'Nur Hidayat'])
                ->assertHeader('content-type', 'application/json')
                ->assertHeader('Author', 'Fauzan Nur Hidayat')
                ->assertHeader('App', 'Belajar Laravel');
        }

        public function testView()
        {
            $this->get('/response/type/view')
                ->assertSeeText('Hello Fauzan');
        }

        public function testJson()
        {
            $this->get('/response/type/json')
                ->assertJson(['firstname' => 'fauzan', 'lastname' => 'nur hidayat']);
        }

        public function testFile()
        {
            $this->get('/response/type/file')
                ->assertHeader('Name', 'image1.jpg')
                ->assertHeader('Content-Type', 'image/jpeg');
        }

        public function testDownload()
        {
            $this->get('/response/type/download')
                ->assertDownload();
        }
}
