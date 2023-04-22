<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Meeting extends Model
{
    use HasFactory;
    public function members()
    {
        return $this->belongsToMany(Member::class, 'attendances', 'meetingId', 'memberId');
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class, "meetingId");
    }
}
