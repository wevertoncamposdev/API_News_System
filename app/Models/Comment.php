<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    use HasFactory;
    use Uuid;
    use SoftDeletes;

    protected $fillable = [
        'author',
        'body',
        'report_id'
    ];

    protected $date = ['deleted_at'];

    public function report()
    {
        return $this->belongsTo(Report::class);
    }
}
