<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\WhatWeDo;
class WhatWeDoCategory extends Model
{

    public function whatwedo() {

        return $this->hasMany(WhatWeDo::class, 'category_id', 'id');
        
    }
    
    use HasFactory;
}
