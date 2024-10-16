<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Equipa extends Model
{
    use CrudTrait;
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'equipa';
    //protected $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded = ['id'];
    protected $fillable = ['nome','image', 'dep_id', 'role_id', 'mandato_id'];
    // protected $hidden = [];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */
    public function setImageAttribute($value)
    {
        $attribute_name = "image";
        $disk = "public";
        $destination_path ="uploads/team";

        $this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path);

         // if the image was erased
         if ($value == null) {
            // delete the image from disk
            if ($this->{$attribute_name}) {
                \Storage::disk($disk)->delete($this->{$attribute_name});
            }

            // set null in the database column
            $this->attributes[$attribute_name] = null;
        }

        // if a base64 was sent, store it in the db
        if (Str::startsWith($value, 'data:image')) {
            // 0. Make the image
            $image = \Image::make($value)->encode('jpg', 90);

            // 1. Generate a filename.
            $filename = md5($value.time()).'.jpg';

            // 2. Store the image on disk.
            \Storage::disk($disk)->put($destination_path.'/'.$filename, $image->stream());

            // 3. Delete the previous image, if there was one.
            \Storage::disk($disk)->delete($this->{$attribute_name});

            // 4. Save the public path to the database
            // but first, remove "public/" from the path, since we're pointing to it from the root folder
            // that way, what gets saved in the database is the user-accesible URL
            $public_destination_path = Str::replaceFirst('public/', '', $destination_path);
            $this->attributes[$attribute_name] = $public_destination_path.'/'.$filename;
        }

    // return $this->attributes[{$attribute_name}]; // uncomment if this is a translatable field
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    public function department(){
        return $this->belongsTo('App\Models\Department');
    }

    
    public function departments(){
        return $this->hasOne('App\Models\Department', 'id', 'dep_id');
    }

    public function role(){
        return $this->belongsTo('App\Models\Cargo');
    }

    public function roles(){
        return $this->hasOne('App\Models\Cargo', 'id', 'role_id');
    }

    public function mandato(){
        return $this->belongsTo('App\Models\Mandato');
    }

    public function mandatos(){
        return $this->hasOne('App\Models\Mandato', 'id', 'mandato_id');
    }



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