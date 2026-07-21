<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property Category $category
 * @property User $user
 */
class Todo extends Model
{
    protected $table = 'todos';

    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'description',
        'priority',
        'completed_at'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
