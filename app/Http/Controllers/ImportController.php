<?php

namespace App\Http\Controllers;

use App\Events\NewImport;
use App\Http\Requests\ImportStoreRequest;
use App\Jobs\SyncMedia;
use App\Mail\ReviewImport;
use App\Models\Import;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ImportController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $imports = Import::all();

        return view('import.index', compact('imports'));
    }

    /**
     * @param \App\Http\Requests\ImportStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ImportStoreRequest $request)
    {
        $import = Import::create($request->validated());

        Mail::send(new ReviewImport($import));

        SyncMedia::dispatch($import);

        event(new NewImport($import));

        return redirect()->route('import.index');
    }
}
