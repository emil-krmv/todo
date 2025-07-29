<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;

class Task extends Model
{
    /** @use HasFactory<\Database\Factories\TaskFactory> */
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'status',
        'priority', 'due_date'
    ];

    /**
     * Scope a query to only include current user's tasks
     */
    #[Scope]
    protected function ownedBy(Builder $query, User $user): void
    {
        $query->where('user_id', $user->id);
    }

    /**
     * Scope a query to only include filtered tasks
     */
    #[Scope]
    protected function filter(Builder $query, array $filters): void
    {
        if (!empty($filters['status'])) {
            $query->whereIn('status', $filters['status']);
        }

        if (!empty($filters['priority'])) {
            $query->whereIn('priority', $filters['priority']);
        }
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
}
