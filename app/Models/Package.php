<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'packages';

    protected $fillable = ['name','price','num_class'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function enrollments()
    {
        return $this->hasMany('App\Models\Enrollment', 'id_package', 'id');
    }
    
}
