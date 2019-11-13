<?php

/*
 * What php team is that is 'one thing, a team, work together'
 */

namespace App\Repositories;

use App\Models\File;

class FileRepository extends BaseRepository
{
    public function __construct(File $file)
    {
        parent::__construct($file);
    }
}
