<?php

namespace Database\Seeders;

use App\Models\Commentphoto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentPhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Commentphoto::insert([
            [
                'photo_id' => 1,
                'user_id' => 4,
                'body' => 'commento alla prima foto del quarto user',
            ],
            [
                'photo_id' => 1,
                'user_id' => 5,
                'body' => 'commento alla prima foto del quinto user',
            ],
        ]);
    }
}
