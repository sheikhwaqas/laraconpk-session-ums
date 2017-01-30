<?php

namespace App;

use App\Role;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = ['label', 'slug'];

    public function setLabelAttribute($value)
    {
        $this->attributes['label'] = ucwords($value);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }
}
