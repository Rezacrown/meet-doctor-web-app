<?php

namespace App\Http\Controllers\backsite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

// import request for validation
use App\Http\Requests\Specialist\StoreSpecialistRequest;
use App\Http\Requests\Specialist\UpdateSpecialistRequest;

// import Model
use App\Models\MasterData\Specialist;

class SpecialistController extends Controller
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
        // get all data specialist then order By created_at with ascending sortir
        $specialist = Specialist::orderBy('created_at', 'desc')->get();

        // cuma test2 aja
        // $specialist = Specialist::pluck('name', 'created_at');
        // $test = DB::table('specialist')->pluck('name', 'created_at');
        // return response($test);

        return response()->view('pages.backsite.master-data.specialist.index', compact('specialist'));
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
    public function store(StoreSpecialistRequest $request)
    {
        // create specialist from request data
        $specialist = Specialist::create($request);

        alert()->success('Success Message', 'Successfully added new specialist');
         return redirect()->route('backsite.specialist.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Specialist $specialist)
    {

        // Specialist $specialist langsung otomatis melakukan get Data $specialist dengan Model Binding
        // jadi tinggal kirim saja dan sudah otomatis di handle si Laravel jika data parameter tidak diemukan
        return response()->view('pages.backsite.master-data.specialist.show', compact('specialist'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSpecialistRequest $request, Specialist $specialist)
    {
        // update specialist with all value by passing request
        $specialist->update($request->all());

        alert()->success('Success Message', 'Successfully Updated specialist');
        return redirect()->route('backsite.specialist.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Specialist $specialist)
    {

        $specialist->forceDelete();

        alert()->success('Success Message', 'Successfully deleted specialist');
        return redirect()->back();
    }
}
