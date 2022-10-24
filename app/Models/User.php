<?php 

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Http\Middleware\Authenticate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
	use HasApiTokens, HasFactory, Notifiable;
	
    public $timestamps = true;

    protected $table = 'users';

    protected $fillable = ['email', 'password',  'name','lastname','document','phone','birthday'];
	
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    // public function clients()
    // {
    //     return $this->hasMany('App\Models\Client', 'id_user', 'id');
    // }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function enrollments()
    {
        return $this->hasMany('App\Models\Enrollment', 'id_user', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function notify()
    {
        // return $this->hasMany('App\Models\Enrollment', 'id_user', 'id');
    }
    
}
