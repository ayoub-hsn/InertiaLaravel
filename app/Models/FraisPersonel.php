<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FraisPersonel extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'frais_auto',
        'frais_tele',
        'frais_gasoil',
        'nbre_days',
        'devplacement',
        'frais_total',
        'import_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'frais_auto' => 'double',
        'frais_tele' => 'double',
        'frais_gasoil' => 'double',
        'devplacement' => 'double',
        'frais_total' => 'double',
        'import_id' => 'integer',
    ];

    public function import()
    {
        return $this->belongsTo(Imports::class);
    }
}
