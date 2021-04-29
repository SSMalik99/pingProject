<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userTasks extends Model
{
    use HasFactory;
    protected $primaryKey = 'task_id';

    /**
     * Get the user that owns the userTasks
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(user::class, 'user_id', 'user_id');
    }

    /**
     * Get the category that owns the userTasks
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(taskCategories::class, 'task_category_id', 'task_category_id');
    }

}
