<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Events extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

       /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */

    protected $fillable = [
        'title',
        'event_schedule',
        'venue',
        'theme',
        'speaker',
        'event_description',
    ];
}
