<?php

namespace App\Http\Controllers\Frontsite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


// use library
use Illuminate\Support\Facades\Storage;
use symfony\Component\HttpFoundation\Response;
// use Response;

// use everythings
use Gate;
use Auth;
use File;

// import model
use App\Models\User;
use App\Models\Operational\Doctor;
use App\Models\MasterData\Specialist;

// three party packcage

class LandingController extends Controller
{
    // akan jalan lebih dulu saat di object di instance "makanya belajar OOP PHP!"
    // public function __construct() {
    //     // register midlleware
    //     $this->middleware('auth');
    // }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $specialist = Specialist::orderBy('name', 'asc')->limit(5)->get();
        $doctor = Doctor::orderBy('created_at', 'asc')->limit(5)->get();

        // return response($specialist);

        return response()->view('pages/frontsite/landingpage/index', compact('specialist', 'doctor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        return abort(404);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        return abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        return abort(404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        return abort(404);
    }
}
