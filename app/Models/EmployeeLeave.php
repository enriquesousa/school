<?php

namespace App\Models;

use App\Models\LeavePurpose;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeLeave extends Model
{
    use HasFactory;


    // Relación con user
    public function user() {
        return $this->belongsTo(User::class, 'employee_id', 'id');
    }

    // Relación con motivos leave purpose
    public function purpose() {
        return $this->belongsTo(LeavePurpose::class, 'leave_purpose_id', 'id');
    }


}
