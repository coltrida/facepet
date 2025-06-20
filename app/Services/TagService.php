<?php

namespace App\Services;

use App\Models\Tag;

class TagService
{
    public function createTag($request)
    {
        Tag::create($request);
    }
}
