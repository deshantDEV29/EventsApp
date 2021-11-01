<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizAttempt extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

       /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */

    protected $fillable = [
        'user_id',
        'attempt',
        'score',
        
    ];
}
