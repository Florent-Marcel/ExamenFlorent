<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model // Ajout B
{
    use HasFactory;

        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'representation_id', 'places'];


   /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'reservations';

   /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    // Interprétation de la f(x) ci-dessous. c'est à User. Une Reservation (La classe dans laquelle cette f(x) est défine) est faite par un seul utilisateur
    public function user() // Raison pour laquelle la f(x) user est au singulier.
    {
        return $this->belongsTo(User::class);
                    // belongsTo = appartient
    }

    /**
     * Get user for this role
     */
    public function representation(){ // Interprétation de cette f(x): Une reservation, c.a.d Reservation (La aclasse dans la quelle cette f(x) est définie ) est concernée/appartient à une seule réprésentation
        return $this->belongsTo(Representation::class); // Raison pour laquelle la f(x) est écrite au singulier.
        // belongTo (appartient à)
    }
}
