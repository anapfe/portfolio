<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['path', 'project_id'];

    public function project() {
      return $this->belongsTo('\App\Project', 'project_id', 'id');
    }
}
