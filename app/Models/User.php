<?php
namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Contracts\JWTSubject;


/** Represents a User in the database.
 *
 * @property int           $id
 * @property string         $first_name
 * @property string         $last_name
 * @property string         $email
 * @property string         $user_name
 * @property string         $password
 * @property string         $remember_token
 * @property bool           $is_admin
 * @property \Carbon\Carbon $email_verified_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @package App\Models
 */

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name', 'email', 'password','is_admin', 'user_name'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts(){
        return $this->hasMany(Post::class,'user_id');
    }

    public function isAdmin() : bool {
        return $this->is_admin;
    }

    public function setPasswordAttribute( $value)
    {
        if(! empty($value) ){
            $this->attributes['password'] = Hash::make($value);
        }
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
