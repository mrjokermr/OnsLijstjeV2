<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

class ShoppingList extends Model
{
    protected $guarded = ['id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function usersWithAccess(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'shopping_list_user_access');
    }

    public function shoppingListItems(): HasMany
    {
        return $this->hasMany(ShoppingListItem::class)->chaperone();
    }

    public function owner(): User
    {
        return $this->user;
    }

    public function allUsersWithAccess(): Collection
    {
        /** @var Collection $usersWithAccess */
        $usersWithAccess = $this->usersWithAccess;
        $usersWithAccess->add($this->user);

        return $usersWithAccess;
    }


}
