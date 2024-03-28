<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RoomStatus extends Model
{
    use HasFactory;
    use HasFactory;

    protected $table = 'room_status'; // กำหนดชื่อตารางที่ถูกต้อง

    protected $fillable = ['name', 'is_available'];

    protected $casts = [
        'is_available' => 'boolean',
    ];
}
