<?php

namespace App\Http\Controllers\backsite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use RealRashid\SweetAlert\Facades\Alert;


// request validate
use App\Http\Requests\Docter\StoreDocterRequest;
use App\Http\Requests\Docter\UpdateDocterRequest;
// models
use App\Models\Operational\Docter;
use App\Models\MasterData\Specialist;


class DocterController extends Controller
{

     public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // for table grid
        $docter = Docter::orderBy('created_at', 'desc')->get();

        // for select2 = ascending a to z
        $specialist = Specialist::orderBy('name', 'asc')->get();

        return response()->view('pages.backsite.operational.docter.index', compact('docter', 'specialist'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDocterRequest $request)
    {
        // automatis create docter by all request
        $docter = Docter::create($request->all());

        alert()->success('Success Message', 'Successfully added new doctor');
        return redirect()->route('backsite.doctor.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Docter $docter)
    {

        return response()->view('pages.backsite.operational.docter.show', compact('docter'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Docter $docter)
    {

        // for select2 = ascending a to z
        $specialist = Specialist::orderBy('name', 'asc')->get();

        return response()->view('pages.backsite.operational.docter.edit', compact('docter', 'specialist'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDocterRequest $request, Docter $docter)
    {
        $data = $request->all();

        $docter->update($data);

        alert()->success('Success Message', 'Successfully updated doctor');
        return redirect()->route('backsite.docter.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Docter $docter)
    {
        $docter->forceDelete();

        alert()->success('Success Message', 'Successfully deleted doctor');
        return redirect()->back();
    }
}
