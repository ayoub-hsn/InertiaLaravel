<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImportStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'num_dossier' => ['required', 'integer'],
            'manifeste' => ['required', 'string'],
            'date' => ['required', 'date'],
            'mat_camion' => ['required', 'string'],
            'mat_remorque' => ['required', 'string'],
            'compagne' => ['required', 'string'],
            'navire' => ['required', 'string'],
            'provenance' => ['required', 'string'],
            'destination' => ['required', 'string'],
            'date_arrivée' => ['required', 'date'],
            'date_sortie' => ['required', 'date'],
            'tarre' => ['required', 'numeric'],
            'poid_brut' => ['required', 'numeric'],
            'nbr_colis' => ['required', 'integer'],
            'frais_peage' => ['required', 'numeric'],
            'frais_TMSA' => ['required', 'numeric'],
            'montant_fret' => ['required', 'numeric'],
            'devise' => ['required', 'numeric'],
        ];
    }
}
