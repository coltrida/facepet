<?php

namespace Database\Seeders;

use App\Models\Message;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Message::insert([
            [
                'sender_id' => 2,
                'receiver_id' => 5,
                'body' => 'ciao',
                'created_at' => Carbon::now()
            ],
            [
                'sender_id' => 5,
                'receiver_id' => 2,
                'body' => 'ciao a te',
                'created_at' => Carbon::now()->addSeconds(2)
            ],
            [
                'sender_id' => 2,
                'receiver_id' => 5,
                'body' => 'come stai?',
                'created_at' => Carbon::now()->addSeconds(4)
            ],
            [
                'sender_id' => 5,
                'receiver_id' => 2,
                'body' => 'tutto bene grazie',
                'created_at' => Carbon::now()->addSeconds(6)
            ],
/*            [
                'sender_id' => 2,
                'receiver_id' => 5,
                'body' => 'ultimo messaggio',
                'created_at' => Carbon::now()->addDays(4)
            ],
            [
                'sender_id' => 5,
                'receiver_id' => 2,
                'body' => 'risposta a ultimo messaggio',
                'created_at' => Carbon::now()->addDays(6)
            ],*/
            [
                'sender_id' => 2,
                'receiver_id' => 6,
                'body' => 'altro primo saluto',
                'created_at' => Carbon::now()->addSeconds(34)
            ],
            [
                'sender_id' => 6,
                'receiver_id' => 2,
                'body' => 'ciao primo saluto',
                'created_at' => Carbon::now()->addSeconds(36)
            ],
        ]);
    }
}
