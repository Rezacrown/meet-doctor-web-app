<?php

namespace App\Http\Requests\Consultation;

use Illuminate\Foundation\Http\FormRequest;

use App\Models\MasterData\Consultation;
use Symfony\Component\HttpFoundation;
// use Illuminate\Contracts\Auth\Access\Gate;
use Illuminate\Validation\Rule;

class UpdateConsultationtRequest extends FormRequest
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
            //
        ];
    }
}
