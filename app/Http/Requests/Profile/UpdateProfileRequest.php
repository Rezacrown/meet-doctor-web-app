<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateProfileRequest extends FormRequest
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
        $email = Auth::user()->email;

        return [
            'name' => ['required', 'string'],
            // ignore $this->route() akan melakukan ignore terhdapat isi parameter dari route tersebut, contoh route: profile/{name} maka akan menjadi $this->route("name")
            'email' => ['required', 'string', 'email', Rule::unique('users', 'email')->ignore($this->route('profile'))],
            'contact' => ["nullable", 'string'],
            'address' => ["nullable", 'string'],
            'gender' => ["nullable", 'string'],
            'photo' => ["nullable", 'image', 'file'],
            'age',
        ];
    }
}
