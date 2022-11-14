<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{

    use HasFactory;
    use Uuid;
    use SoftDeletes;

    protected $fillable = [
        'dataURL',
        'author',
        'description',
    ];

    protected $date = ['deleted_at'];

}
