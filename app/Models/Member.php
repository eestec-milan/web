<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Member extends Model
{
    use HasFactory;

    public function meetings()
    {
        return $this->belongsToMany(Meeting::class, 'attendances', 'memberId', 'meetingId');
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class, "memberId");
    }
}
