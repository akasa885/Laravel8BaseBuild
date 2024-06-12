<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class QuizSession extends Model
{
    use HasFactory;

    protected $fillable = ['quiz_id', 'token', 'created_by', 'started_at', 'ended_at', 'is_open'];

    protected $casts = [
        'started_at' => 'datetime',
        'ended_at' => 'datetime',
        'is_open' => 'boolean',
    ];

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function scopeOpenQuiz($query)
    {
        return $query->where(function ($query) {
            $query->whereNull('started_at')->where('is_open', true);
        })->orWhere(function ($query) {
            $query->where('started_at', '<=', Carbon::now())->where('ended_at', '>=', Carbon::now());
        });
    }
}
