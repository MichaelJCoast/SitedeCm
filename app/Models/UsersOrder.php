<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

use Backpack\CRUD\app\Models\Traits\CrudTrait;

class UsersOrder extends User
{

    use CrudTrait;
    
protected $table = 'users';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', //some more vars
    ];
    
    public function merch()
    {
        return $this->belongsToMany('App\Models\Merch', 'order', 'user', 'product')->withTimestamps();
    }
    
}