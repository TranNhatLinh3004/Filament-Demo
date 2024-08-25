<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Author extends Model
{
    use HasFactory;
    protected $table = 'authors';

    protected $guarded = [];

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class, 'author_id');
    }
}
