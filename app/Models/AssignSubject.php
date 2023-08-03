<?php

namespace App\Models;

use App\Models\SchoolSubject;
use App\Models\StudentClass;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignSubject extends Model
{
    use HasFactory;

    // relación con el 'id' de la tabla 'student_classes'
    public function student_class() {
        return $this->belongsTo(StudentClass::class, 'class_id', 'id');
    }

    // relación con el 'id' de la tabla 'school_subjects'
    public function school_subject() {
        return $this->belongsTo(SchoolSubject::class, 'subject_id', 'id');
    }


}
