<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['title', 'description', 'year', 'client', 'primary_img'];

    public function tags() {
      return $this->belongsToMany('\App\Tag', 'project_tag', 'project_id', 'tag_id');
    }

    public function images() {
      return $this->hasMany('\App\Image', 'project_id', 'id');
    }
}
