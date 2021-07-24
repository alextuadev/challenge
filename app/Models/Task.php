<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Task extends Model
{
    use HasFactory;

    protected $table = 'tasks';
    
    protected $fillable = [
        "description",
        "due_date",
        "user_id",
        "created_by",
    ];

    public function comments() :HasMany
    {
        return $this->hasMany(\App\Models\Log::class, "task_id", "id");
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
