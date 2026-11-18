<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Categories extends Model
{
   protected $fillable = [
    'name',
    'slug'
   ];
   public function courses():HasMany {
      return $this->hasMany(Course::class,'category_id');
   }
}
