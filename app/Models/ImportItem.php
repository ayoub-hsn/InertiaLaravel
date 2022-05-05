<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImportItem extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'num_position',
        'type',
        'client_id',
        'importateur',
        'exportateur',
        'transitaire_id',
        'marchandise',
        'dum',
        'nbr_colis',
        'poid_brut',
        'observation',
        'import_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'client_id' => 'integer',
        'transitaire_id' => 'integer',
        'poid_brut' => 'double',
        'import_id' => 'integer',
    ];

    public function client()
    {
        return $this->belongsTo(Clients::class);
    }

    public function transitaire()
    {
        return $this->belongsTo(Transitaires::class);
    }

    public function import()
    {
        return $this->belongsTo(Imports::class);
    }
}
