<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    use HasFactory;
    protected $fillable = [
       'user_id','role_id'
    ];
    protected $table = 'role_user';
    public $timestamps = false;

    /**
     * Get the role of the user
     */
    public function role()
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * Get user for this role
     */
    public function user()
    {
        return $this->belongToMany(Role::class);
    }

}
