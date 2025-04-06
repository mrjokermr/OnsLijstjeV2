<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MealRecipe extends Model
{
    protected $guarded = ['id'];

    public function meal(): BelongsTo
    {
        return $this->belongsTo(Meal::class);
    }

    public function mealRecipeSteps(): HasMany
    {
        return $this->hasMany(MealRecipeStep::class);
    }
}
