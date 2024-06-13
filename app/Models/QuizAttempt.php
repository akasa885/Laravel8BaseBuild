<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Traits\UuidIdenty;

class QuizAttempt extends Model
{
    use HasFactory, UuidIdenty;

    protected $fillable = [
        'quiz_session_id',
        'quiz_id',
        'user_name',
        'user_ip',
        'user_agent',
    ];


    public function quizSession()
    {
        return $this->belongsTo(QuizSession::class);
    }

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    public function answers()
    {
        return $this->hasMany(QuizAttemptAnswer::class);
    }
}
