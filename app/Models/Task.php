<?php

namespace App\Models;

use Carbon\Carbon;
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

    protected $casts = [
        'due_date' => 'datetime:Y-m-d',
    ];

    public function comments(): HasMany
    {
        return $this->hasMany(\App\Models\Log::class, "task_id", "id");
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, "created_by");
    }


    public function getExpiredAttribute()
    {
        $carbon_date = Carbon::createFromTimeString($this->due_date, config('timezone'));
        return $carbon_date->isPast();
    }
}
