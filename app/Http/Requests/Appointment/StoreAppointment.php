<?php

namespace App\Http\Requests\Appointment;

use Illuminate\Foundation\Http\FormRequest;

class StoreAppointment extends FormRequest
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
            'doctor_id' => ['required', 'integer',],
            'consultation_id' => ['required', 'integer',],
            'level_id' => ['required', 'integer',],
            'date' => ['required',],
            'time' => ['required',],



        ];
    }


    // akan redirect jika validasi gagal
    public function redirect()
    {
        return redirect()->route('login');
    }
}
