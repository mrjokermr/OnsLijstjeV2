<?php

use App\Models\MealRecipe;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('meal_recipe_steps', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(MealRecipe::class)->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->text('explanation');
            $table->integer('index')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meal_recipe_steps');
    }
};
