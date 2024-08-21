<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameTimes extends Model
{
    use HasFactory;

    protected $fillable = [
      'game_id',
      'actual_start_time',
      'actual_end_time'
    ];

}
