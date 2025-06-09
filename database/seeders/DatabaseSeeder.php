<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        /*User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);*/

        $this->call(UserSeeder::class);
        $this->call(CommentSeeder::class);
        $this->call(ReplySeeder::class);
        $this->call(FollowerSeeder::class);
        $this->call(AlbumSeeder::class);
        $this->call(PhotoSeeder::class);
        $this->call(CommentPhotoSeeder::class);
        $this->call(NotifySeeder::class);


        Storage::disk('public')->deleteDirectory('/posts/');
        Storage::disk('public')->deleteDirectory('/albums/');
        Storage::disk('public')->deleteDirectory('/profiles/');
        Storage::disk('public')->deleteDirectory('/landscapes/');
        Storage::disk('public')->deleteDirectory('/livewire-tmp/');

        Storage::disk('public')->makeDirectory('/posts');
        Storage::disk('public')->makeDirectory('/albums');
        Storage::disk('public')->makeDirectory('/profiles');
        Storage::disk('public')->makeDirectory('/landscapes');
        Storage::disk('public')->makeDirectory('/livewire-tmp');


        $fileContent = Storage::disk('local')->get('/posts/1.jpg');
        Storage::disk('public')->put('/posts/1.jpg', $fileContent);
        $fileContent = Storage::disk('local')->get('/posts/2.jpg');
        Storage::disk('public')->put('/posts/2.jpg', $fileContent);

        $fileContent = Storage::disk('local')->get('/profiles/2.jpg');
        Storage::disk('public')->put('/profiles/2.jpg', $fileContent);
        $fileContent = Storage::disk('local')->get('/profiles/3.jpg');
        Storage::disk('public')->put('/profiles/3.jpg', $fileContent);

        $fileContent = Storage::disk('local')->get('/albums/photo.jpg');
        Storage::disk('public')->put('/albums/photo.jpg', $fileContent);

        $fileContent = Storage::disk('local')->get('/albums/1/1.jpg');
        Storage::disk('public')->put('/albums/1/1.jpg', $fileContent);
        $fileContent = Storage::disk('local')->get('/albums/1/2.jpg');
        Storage::disk('public')->put('/albums/1/2.jpg', $fileContent);
        $fileContent = Storage::disk('local')->get('/albums/2/3.jpg');
        Storage::disk('public')->put('/albums/2/3.jpg', $fileContent);
        $fileContent = Storage::disk('local')->get('/albums/2/4.jpg');
        Storage::disk('public')->put('/albums/2/4.jpg', $fileContent);
        $fileContent = Storage::disk('local')->get('/albums/3/5.jpg');
        Storage::disk('public')->put('/albums/3/5.jpg', $fileContent);
        $fileContent = Storage::disk('local')->get('/albums/3/6.jpg');
        Storage::disk('public')->put('/albums/3/6.jpg', $fileContent);
        $fileContent = Storage::disk('local')->get('/albums/3/7.jpg');
        Storage::disk('public')->put('/albums/3/7.jpg', $fileContent);
    }
}
