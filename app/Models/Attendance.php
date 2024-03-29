<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attendance extends Model
{
    use HasFactory;
    public function member()
    {
        return $this->belongsTo(Member::class, 'memberId', 'id');
    }
    public function meeting()
    {
        return $this->belongsTo(Meeting::class, 'meetingId', 'id');
    }
}
