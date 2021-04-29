<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class userRoles extends Model
{
    use HasFactory;
    protected $primaryKey = 'role_id';

    /**
     * Get all of the users for the userRoles
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users(){
        return $this->hasMany(user::class, 'role_id', 'role_id');
    }

}
