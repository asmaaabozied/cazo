<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rolesPermissions extends Model
{
    public $table = 'roles_permissions';

    public $fillable = [
        'role_id',
        'permission_id'
    ];

}
