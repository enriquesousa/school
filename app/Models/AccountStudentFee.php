<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountStudentFee extends Model
{
    use HasFactory;

    // relación con el 'id' de la tabla 'users'
    public function student() {
        return $this->belongsTo(User::class, 'student_id', 'id');
    }

    // relación con el 'id' de la tabla 'student_classes'
    public function student_class() {
        return $this->belongsTo(StudentClass::class, 'class_id', 'id');
    }

    // relación con el 'id' de la tabla 'student_years'
    public function student_year() {
        return $this->belongsTo(StudentYear::class, 'year_id', 'id');
    }

    // relación con el 'assign_student_id' de la tabla 'discount_students'
    public function discount() {
        return $this->belongsTo(DiscountStudent::class, 'id', 'assign_student_id');
    }

    // relación con el 'id' de la tabla 'student_groups'
    public function group()
    {
        return $this->belongsTo(StudentGroup::class, 'group_id', 'id');
    }

    // relación con el 'id' de la tabla 'student_shifts'
    public function shift()
    {
        return $this->belongsTo(StudentShift::class, 'shift_id', 'id');
    }

    // relación con el 'id' de la tabla 'fee_categories'
    public function fee_category()
    {
        return $this->belongsTo(FeeCategory::class, 'fee_category_id', 'id');
    }



}
