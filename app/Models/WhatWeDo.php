<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\WhatWeDoCategory;

class WhatWeDo extends Model
{
    use HasFactory;

    public function category() {

        return $this->belongsTo(WhatWeDoCategory::class, 'category_id');
        
    }
}
