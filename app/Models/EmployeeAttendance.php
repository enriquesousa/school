<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeAttendance extends Model
{
    use HasFactory;

    // relación con tabla users
    public function user() {
        return $this->belongsTo(User::class, 'employee_id', 'id');
    }


}
