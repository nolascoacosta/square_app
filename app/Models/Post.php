<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
 * Represents a Post in the database.
 *
 * @property int            $id
 * @property string         $title
 * @property string         $slug
 * @property string         $description
 * @property int            $user_id
 * @property \Carbon\Carbon $publication_date
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @package App\Models
 */
class Post extends Model
{
    protected $fillable = [
        'title','slug', 'description','user_id','publication_date'
    ];

  /*  public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value);
    }*/

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    protected $casts = [
        'publication_date'
    ];
}
