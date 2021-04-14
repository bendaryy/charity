<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Model\Details;

class Branch extends Model
{
    use HasFactory;

    public function details(){
        return $this->hasMany(Details::class);
    }
}
