<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Models;
use Exception;

class TrashService
{

    /**
     * Get all of the models from the database.
     */
    public function getAllTrashed($table)
    {
        switch ($table) {
            case 'report':
                return Models\Report::onlyTrashed()->get();
                break;
            case 'comment':
                return Models\Comment::onlyTrashed()->get();
                break;
            case 'image':
                return Models\Image::onlyTrashed()->get();
                break;
        }
    }
}
