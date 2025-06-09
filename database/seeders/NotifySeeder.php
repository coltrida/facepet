<?php

namespace Database\Seeders;

use App\Models\Notify;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NotifySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Notify::insert([
            [
                'sender_id' => 3,
                'receiver_id' => 2,
                'post_id' => 1,
                'photo_id' => null,
                'read' => 0,
                'body' => 'a cacao2 piace il tuo post',
                'created_at' => Carbon::now()
            ],
            [
                'sender_id' => 5,
                'receiver_id' => 2,
                'post_id' => 1,
                'photo_id' => null,
                'read' => 1,
                'body' => 'a Mr. Wiley piace il tuo post',
                'created_at' => Carbon::now()
            ],
            [
                'sender_id' => 4,
                'receiver_id' => 2,
                'post_id' => 2,
                'photo_id' => null,
                'read' => 0,
                'body' => 'a cacao3 piace il tuo post',
                'created_at' => Carbon::now()
            ],
            [
                'sender_id' => 4,
                'receiver_id' => 3,
                'post_id' => 3,
                'photo_id' => null,
                'read' => 1,
                'body' => 'a cacao3 piace il tuo post',
                'created_at' => Carbon::now()
            ],
            [
                'sender_id' => 7,
                'receiver_id' => 2,
                'post_id' => null,
                'photo_id' => 1,
                'read' => 1,
                'body' => 'a Jared piace la tua foto',
                'created_at' => Carbon::now()
            ],
            [
                'sender_id' => 4,
                'receiver_id' => 2,
                'post_id' => null,
                'photo_id' => 2,
                'read' => 1,
                'body' => 'a cacao3 piace la tua foto',
                'created_at' => Carbon::now()
            ],
        ]);
    }
}
