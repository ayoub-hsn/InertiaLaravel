<?php

namespace Tests\Feature\Http\Controllers;

use App\Events\NewImport;
use App\Jobs\SyncMedia;
use App\Mail\ReviewImport;
use App\Models\Import;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Queue;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ImportController
 */
class ImportControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $imports = Import::factory()->count(3)->create();

        $response = $this->get(route('import.index'));

        $response->assertOk();
        $response->assertViewIs('import.index');
        $response->assertViewHas('imports');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ImportController::class,
            'store',
            \App\Http\Requests\ImportStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $num_dossier = $this->faker->numberBetween(-10000, 10000);
        $manifeste = $this->faker->word;
        $date = $this->faker->date();
        $mat_camion = $this->faker->word;
        $mat_remorque = $this->faker->word;
        $compagne = $this->faker->word;
        $navire = $this->faker->word;
        $provenance = $this->faker->word;
        $destination = $this->faker->word;
        $date_arrivée = $this->faker->date();
        $date_sortie = $this->faker->date();
        $tarre = $this->faker->randomFloat(/** double_attributes **/);
        $poid_brut = $this->faker->randomFloat(/** double_attributes **/);
        $nbr_colis = $this->faker->numberBetween(-10000, 10000);
        $frais_peage = $this->faker->randomFloat(/** double_attributes **/);
        $frais_TMSA = $this->faker->randomFloat(/** double_attributes **/);
        $montant_fret = $this->faker->randomFloat(/** double_attributes **/);
        $devise = $this->faker->randomFloat(/** double_attributes **/);

        Mail::fake();
        Queue::fake();
        Event::fake();

        $response = $this->post(route('import.store'), [
            'num_dossier' => $num_dossier,
            'manifeste' => $manifeste,
            'date' => $date,
            'mat_camion' => $mat_camion,
            'mat_remorque' => $mat_remorque,
            'compagne' => $compagne,
            'navire' => $navire,
            'provenance' => $provenance,
            'destination' => $destination,
            'date_arrivée' => $date_arrivée,
            'date_sortie' => $date_sortie,
            'tarre' => $tarre,
            'poid_brut' => $poid_brut,
            'nbr_colis' => $nbr_colis,
            'frais_peage' => $frais_peage,
            'frais_TMSA' => $frais_TMSA,
            'montant_fret' => $montant_fret,
            'devise' => $devise,
        ]);

        $imports = Import::query()
            ->where('num_dossier', $num_dossier)
            ->where('manifeste', $manifeste)
            ->where('date', $date)
            ->where('mat_camion', $mat_camion)
            ->where('mat_remorque', $mat_remorque)
            ->where('compagne', $compagne)
            ->where('navire', $navire)
            ->where('provenance', $provenance)
            ->where('destination', $destination)
            ->where('date_arrivée', $date_arrivée)
            ->where('date_sortie', $date_sortie)
            ->where('tarre', $tarre)
            ->where('poid_brut', $poid_brut)
            ->where('nbr_colis', $nbr_colis)
            ->where('frais_peage', $frais_peage)
            ->where('frais_TMSA', $frais_TMSA)
            ->where('montant_fret', $montant_fret)
            ->where('devise', $devise)
            ->get();
        $this->assertCount(1, $imports);
        $import = $imports->first();

        $response->assertRedirect(route('import.index'));

        Mail::assertSent(ReviewImport::class, function ($mail) use ($import) {
            return $mail->import->is($import);
        });
        Queue::assertPushed(SyncMedia::class, function ($job) use ($import) {
            return $job->import->is($import);
        });
        Event::assertDispatched(NewImport::class, function ($event) use ($import) {
            return $event->import->is($import);
        });
    }
}
