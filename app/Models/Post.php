<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'author', 'slug', 'body'];

    protected $with = ['user', 'category'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function category(): BelongsTo{
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function scopeFilter(Builder $query, array $filters): void{
        $query->when(isset($filters['search']) ? $filters['search'] : false, function($query, $search){
            $query->where('title', 'like', '%' . request('search') . '%');
        });

        $query->when(
            //Alternative sort for whatever was first above lol
            $filters['category'] ?? false,
            //Arrow function
            fn ($query, $category) =>
            $query->whereHas('category', fn($query) => $query->where('slug', $category))
        );
    }
}
