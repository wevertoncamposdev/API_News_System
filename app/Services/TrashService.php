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
            case 'reports':
                return Models\Report::onlyTrashed()->get();
                break;
            case 'comments':
                return Models\Comment::onlyTrashed()->get();
                break;
            case 'images':
                return Models\Image::onlyTrashed()->get();
                break;
        }
    }
}
