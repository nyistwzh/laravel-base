<?php

namespace App\Observers;

use App\Enum\SystemEnum;
use App\Models\File;

class FileObserver
{
    public function saving(File $file)
    {
        $user = auth()->user();
        $file->user_id = $user ? $user->id : SystemEnum::NOT_ASSOCIATE;
    }
}
