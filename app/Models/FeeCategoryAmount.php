<?php

namespace App\Models;

use App\Models\FeeCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeCategoryAmount extends Model
{
    use HasFactory;

    // relación con el 'id' de la tabla 'fee_categories'
    public function fee_category() {
        return $this->belongsTo(FeeCategory::class, 'fee_category_id', 'id');
    }


}
