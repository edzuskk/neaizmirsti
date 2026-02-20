<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reminder extends Model
{
    protected $table = 'user_reminders';
    protected $fillable = ['reminder', 'date', 'time', 'user_id', 'is_done'];
    public function getExpiresAtAttribute()
    {
        return \Carbon\Carbon::parse($this->date . ' ' . $this->time);
    }
}
