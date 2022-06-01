<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'cargos';
    protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = ['type'];
    // protected $hidden = [];
    // protected $dates = [];
    public function roles() {
        return $this->belongsToMany('App\Models\Cargo')->withPivot('notes', 'some_other_field'); // `notes` and `some_other_field` are aditional fields in the pivot table that you plan to show in the form.
    }
    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */
/*
    public function role(){
        return $this->belongsTo('App\Models\Role');
    }
    */
    /*
    public function roles(){
        return $this->hasMany('App\Models\Role');
    }
    
    /*
    
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
