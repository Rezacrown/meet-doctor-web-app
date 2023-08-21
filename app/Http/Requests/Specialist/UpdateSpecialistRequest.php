<?php

namespace App\Http\Requests\Specialist;

use Illuminate\Foundation\Http\FormRequest;

use App\Models\Operational\Docter;
use Symfony\Component\HttpFoundation;
// use Illuminate\Contracts\Auth\Access\Gate;
use Illuminate\Validation\Rule;

class UpdateSpecialistRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255', Rule::unique('specialist')->ignore($this->specialist)],
            // bisa pakai Rule::unique() untuk validasi
            'pricing' => ['required', 'string', 'max:255'],
        ];
    }
}
