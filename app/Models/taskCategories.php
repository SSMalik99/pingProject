<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class taskCategories extends Model
{
    use HasFactory;
    protected $primaryKey = 'task_category_id';

    /**
     * Get all of the userTasks for the taskCategories
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function userTasks()
    {
        return $this->hasMany(userTasks::class, 'task_category_id', 'task_category_id');
    }
}
