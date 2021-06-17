<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Troupe extends Model
{
    use HasFactory;

    protected $fillable = ['nom'];

    protected $table = 'troupes';

    public function artists(){
        return $this->hasMany(Artist::class);
    }
}
