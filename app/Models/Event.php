<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Date;

/**
 * @property int $id
 * @property string $name
 * @property string description
 * @property string image
 * @property string location
 * @property Date date
 */
class Event extends Model
{
    use HasFactory;
}
