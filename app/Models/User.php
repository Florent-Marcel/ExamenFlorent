<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Filament\Models\Concerns\IsFilamentUser;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use SebastianBergmann\Environment\Console;

class User extends Authenticatable implements FilamentUser
{
    use HasFactory, Notifiable, IsFilamentUser;

    public function canAccessFilament(){
        foreach($this->roles as $role){
            if($role->role == 'admin'){
                return true;
            }
        }
        return false;
    }

    public function isFilamentAdmin()
    {
        return $this->canAccessFilament();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'login',
        'firstname',
        'lastname',
        'langue',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

     /**
     * Define the relation with Role
     *
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function representations()
    {
        return $this->belongsToMany(Representation::class);
    }
}
