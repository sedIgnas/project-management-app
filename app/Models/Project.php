<?php

namespace App\Models;

use App\Models\Group;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Project extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
      'name',
      'group_size',
      'group_count'
    ];

    public function groups()
    {
      return $this->hasMany(Group::class);
    }
}
