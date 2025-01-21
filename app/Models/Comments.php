<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Comments extends Model
{
    protected $table = 'comments';
    protected $fillable = [
        'comment',
    ];
    public function Project(): BelongsToMany
    {
        return $this->belongsToMany(Project::class, 'projects_comments', 'comment_id');
    }
}
