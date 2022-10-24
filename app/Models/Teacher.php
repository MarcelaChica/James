<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'teachers';

    protected $fillable = ['name','lastname','document'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bookings()
    {
        return $this->hasMany('App\Models\Booking', 'id_teacher', 'id');
    }
    
}
