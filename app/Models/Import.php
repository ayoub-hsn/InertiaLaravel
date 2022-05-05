<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Import extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'num_dossier',
        'manifeste',
        'date',
        'driver_id',
        'mat_camion',
        'mat_remorque',
        'compagne',
        'navire',
        'provenance',
        'destination',
        'date_arrivée',
        'date_sortie',
        'observation',
        'tarre',
        'poid_brut',
        'nbr_colis',
        'frais_peage',
        'frais_TMSA',
        'montant_fret',
        'devise',
        'cours',
        'type',
        'user_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'date' => 'date',
        'driver_id' => 'integer',
        'date_arrivée' => 'date',
        'date_sortie' => 'date',
        'tarre' => 'double',
        'poid_brut' => 'double',
        'frais_peage' => 'double',
        'frais_TMSA' => 'double',
        'montant_fret' => 'double',
        'devise' => 'double',
        'user_id' => 'integer',
    ];

    public function driver()
    {
        return $this->belongsTo(Drivers::class);
    }

    public function user()
    {
        return $this->belongsTo(Users::class);
    }
}
