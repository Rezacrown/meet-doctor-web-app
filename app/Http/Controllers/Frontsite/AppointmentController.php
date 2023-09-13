<?php

namespace App\Http\Controllers\Frontsite;

use App\Http\Controllers\Controller;
use App\Http\Requests\Appointment\StoreAppointment;
use Illuminate\Http\Request;

// use library
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use symfony\Component\HttpFoundation\Response;
// use Response;

// use everythings
use Gate;
use File;
use illuminate\Support\Facades\Auth;

// import model
use App\Models\User;
use App\Models\Operational\Doctor;
use App\Models\MasterData\Specialist;
use App\Models\Operational\Appointment;
use App\Models\MasterData\Consultation;
use App\Models\MasterData\ConfigPayment;
use Illuminate\Support\Facades\Validator;

// three party packcage

class AppointmentController extends Controller
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
        return response()->view('pages/frontsite/appointment/index');
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
    public function store(Request $request)
    {
        // validasi request yg dikirim harus sesuai jika tidak redirect kembali ke page sebelumnya
        // $validate = Validator::make($request->all(), [
        //     'doctor_id' => ['required', 'integer',],
        //     'consultation_id' => ['required', 'integer',],
        //     'level_id' => ['required', 'integer'],
        //     'date' => ['required', 'date_format:format'],
        //     'time' => ['required', 'date_format:format'],
        // ]);

        // if ($validate->fails()) {
        //     Alert::error('Data appoinment tidak lengkap', 'mohon untuk isi semua datanya');
        //     return response()->redirectTo("appointment/doctor/$request->doctor_id");
        // }



        $data = $request->all();

        // ubah string jadi format time untuk simpan ke Db, contoh "12:30 Pm" jadi 12:30
        $time = Str::substr($data['time'], 0, 5);


        $appointment = new Appointment;
        $appointment->doctor_id = $data['doctor_id'];
        $appointment->user_id = Auth::user()->id;
        $appointment->consultation_id = $data['consultation_id'];
        $appointment->level = $data['level_id'];
        $appointment->date = $data['date'];
        $appointment->time = $time;
        $appointment->status = 2; // set to waiting payment
        $appointment->save();

        // return response($appointment);

        // lempar appoinment id untuk page payment appointment
        return redirect()->route('payment.appointment', $appointment->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return abort(403);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return abort(403);
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
        return abort(403);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return abort(403);
    }

    // custom controller

    public function appointment($id)
    {
        $doctor = Doctor::where('id', $id)->first();
        $consultation = Consultation::orderBy('name', 'asc')->get();

        return view('pages.frontsite.appointment.index', compact('doctor', 'consultation'));
    }
}
