<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Representation extends Model
{
    use HasFactory;

    protected $fillable = [
        'show_id',
        'when',
        'location_id',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    protected $table = 'Representations';

    public function show(){
        return $this->belongsTo(Show::class);
    }

    public function location(){
        return $this->belongsTo(Location::class);
    }

    public function users(){
        return $this->belongsToMany(User::class);
    }

    // Interprétation de la f(x) ci-dessous: Une representation, c.a.d Representation(La classe dans laquelle cette (x) qui est reservations est dénie) peut +eurs reservations.
    public function reservations(){ // Ajout B.
        return $this->hasMany(Reservation::class);// Raison pour laquelle la f(x), c.a.d reservations est au pluriel.
        // hasMany= a +eurs.
    }
}
