<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{

    use HasFactory;
    use Uuid;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'author',
        'body',
    ];

    protected $date = ['deleted_at'];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function images()
    {
        return $this->belongsToMany(Image::class)
        ->withTimestamps();
    }
    
}
