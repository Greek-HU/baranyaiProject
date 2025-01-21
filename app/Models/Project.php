<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Project extends Model
{
    protected $table = 'project_name';
    protected $fillable = [
        'name',
    ];

    public function Comments() : HasOne
    {
        return $this->hasOne(Comments::class, 'projects_comments', 'project_id');
    }
}
