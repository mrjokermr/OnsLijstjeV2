<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MealRecipeStep extends Model
{
    protected $guarded = ['id'];

    public function mealRecipe(): BelongsTo
    {
        return $this->belongsTo(MealRecipe::class);
    }
}
