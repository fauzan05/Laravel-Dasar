<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class FileStorageTest extends TestCase
{
    public function testStorage()
    {
        $fileSystem = Storage::disk('local');
        $fileSystem->put('file.txt', 'Ini adalah isi dari file.txt ke storage');
        $content = $fileSystem->get('file.txt');

        self::assertEquals('Ini adalah isi dari file.txt ke storage', $content);
    } 
    public function testPublic()
    {
        $fileSystem = Storage::disk('public');
        $fileSystem->put('file.txt', 'Ini adalah isi dari file.txt ke public');
        $content = $fileSystem->get('file.txt');

        self::assertEquals('Ini adalah isi dari file.txt ke public', $content);
    } 

    public function testUpload()
    {
        $image = UploadedFile::fake()->image('image1.jpg');
        $this->post('/file/upload', [
            'image' => $image
        ])->assertSeeText('OK image1.jpg has been successfully uploaded');
    }
}
