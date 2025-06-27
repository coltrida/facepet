<?php

namespace App\Services;

use App\Models\Message;

class MessageService
{
    public function insertMessage($request)
    {
        Message::create($request->all());
    }
}
