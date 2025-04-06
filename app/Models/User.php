<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function shoppingLists(): HasMany
    {
        return $this->hasMany(ShoppingList::class)->chaperone();
    }

    public function shoppingListsWithAccess(): BelongsToMany
    {
        return $this->belongsToMany(ShoppingList::class, 'shopping_list_user_access');
    }

    public function meals(): HasMany
    {
        return $this->hasMany(Meal::class)->chaperone();
    }

    public function shoppingListItemSuggestions(): HasMany
    {
        return $this->hasMany(ShoppingListItemSuggestion::class)->chaperone();
    }
}
