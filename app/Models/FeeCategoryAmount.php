<?php

namespace App\Models;

use App\Models\FeeCategory;
use App\Models\StudentClass;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeCategoryAmount extends Model
{
    use HasFactory;

    // relación con el 'id' de la tabla 'fee_categories'
    public function fee_category() {
        return $this->belongsTo(FeeCategory::class, 'fee_category_id', 'id');
    }

    // relación con el 'id' de la tabla 'student_classes'
    public function student_class()
    {
        return $this->belongsTo(StudentClass::class, 'class_id', 'id');
    }


}
