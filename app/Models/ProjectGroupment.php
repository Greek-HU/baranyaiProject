<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ProjectGroupment extends Model
{
    use HasFactory;
    protected $table = 'projects_comments';
    protected $fillable = [
        'project_id',
        'comment_id'
    ];

    public function Project() :  BelongsToMany
    {
        return $this->belongsToMany(Project::class, 'nails_groupment', 'project_id');
    }
    public function Comment() :  BelongsToMany
    {
        return $this->belongsToMany(Comments::class, 'nails_groupment', 'comment_id');
    }
}
