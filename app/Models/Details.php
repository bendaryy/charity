<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Details extends Model
{
    use HasFactory;
    public function branch(){
        return $this->belongsTo(Branch::class,'charity_id');
    }
    public function withdraw(){
        return $this->hasMany(WithDraw::class);
    }
    public function category(){
        return $this->belongsTo(Categories::class,'category_id');
    }
}
