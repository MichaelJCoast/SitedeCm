<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission as OriginalPermission;

class Permission extends OriginalPermission
{
    use CrudTrait;
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;

    protected $fillable = ['name', 'guard_name', 'updated_at', 'created_at'];
}
