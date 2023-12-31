<?php

namespace App\Http\Requests\Consultation;

use Illuminate\Foundation\Http\FormRequest;

use App\Models\MasterData\Consultation;
use Symfony\Component\HttpFoundation;
// use Illuminate\Contracts\Auth\Access\Gate;
use Illuminate\Validation\Rule;

class StoreConsultationtRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255', Rule::unique('consultation')]
            // cara lain selain manual pakai string bisa pakai class Rule untuk membuat aturan request nya
        ];
    }
}
