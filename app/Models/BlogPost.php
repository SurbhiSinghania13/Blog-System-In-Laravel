<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BlogPost extends Model
{
    use HasFactory;
    // use SoftDeletes;
    // protected $dates = ['deleted_at'];

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected $fillable = [
        'title', 
        'content',
        'post_date'
    ];
}
