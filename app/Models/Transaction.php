<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

enum RepetitionInterval: string
{
    case Daily = 'daily';
    case TWITTER = 'twitter';
    case YOUTUBE = 'youtube';
}

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'user_id',
        'amount',
        'category_id',
        'repetition_interval',
        'date',
        'inflow',
    ];
}
