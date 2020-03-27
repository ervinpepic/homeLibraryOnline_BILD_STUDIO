<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $guarded = [];
    public function permissions() {
        return $this->belongsToMany(Permission::class,'permission_role')->withTimestamps();
    }

    public function allowTo($permission) {
        if(is_string($permission)) {
            $permission = Permission::whereName($permission)->firstOrFail();
        }
        $this->permissions()->sync($permission,false);
    }
}
