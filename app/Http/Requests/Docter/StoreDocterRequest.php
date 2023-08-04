<?php

namespace App\Http\Requests\Docter;

use Illuminate\Foundation\Http\FormRequest;

use App\Models\Operational\Docter;
use Symfony\Component\HttpFoundation;
// use Illuminate\Contracts\Auth\Access\Gate;
use Illuminate\Validation\Rule;

class StoreDocterRequest extends FormRequest
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
            'specialist_id' => ['required', 'integer',],
            'name' => ['required', 'string', 'max' => 255],
            'fee' => ['required', 'string', 'max' => 255],
            'photo' => ['nullable', 'string', 'max:10000'],
            // cara lain selain pakai tanda => panah
        ];
    }
}
