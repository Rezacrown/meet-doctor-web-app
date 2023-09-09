<?php

namespace App\Http\Controllers\Backsite;

use App\Http\Controllers\Controller;
use App\Http\Requests\Consultation\StoreConsultationtRequest;
use App\Http\Requests\Consultation\UpdateConsultationtRequest;
use App\Models\MasterData\Consultation;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{

      public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consultation = Consultation::orderBy('created_at', 'desc')->get();

        return response()->view('pages.backsite.master-data.consultation.index', compact('consultation'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return abort(403);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreConsultationtRequest $request)
    {
        // get all request from frontsite
        $data = $request->all();

        // store to database
        $consultation = Consultation::create($data);

        alert()->success('Success Message', 'Successfully added new consultation');
        return redirect()->route('backsite.consultation.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Consultation $consultation)
    {

        return response()->view('pages.backsite.master-data.consultation.show', compact('consultation'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Consultation $consultation)
    {

        return response()->view('pages.backsite.master-data.consultation.edit', compact('consultation'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateConsultationtRequest $request, Consultation $consultation)
    {
        $consultation->update($request->all());

         alert()->success('Success Message', 'Successfully updated consultation');
        return redirect()->route('backsite.consultation.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Consultation $consultation)
    {
        $consultation->forceDelete();

        alert()->success('Success Message', 'Successfully deleted consultation');
        return response()->back();
    }
}
