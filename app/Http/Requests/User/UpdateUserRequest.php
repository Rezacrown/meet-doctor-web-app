<?php

namespace App\Http\Requests\User;


use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;
use Symfony\Component\HttpFoundation;
// use Illuminate\Contracts\Auth\Access\Gate;


// this rule only update request
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // create middleware from kernel.php here

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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', Rule::unique('users')->ignore($this->route('user'))],
            // 'email' => ['required', 'string', 'email',]

            // Rule:: unique only work for other record id

            // mengapa ada $this->User ? itu karena mengacu pada Model yang dibuat dan karena User itu secara default dari jetsream nya maka kita ikut aja aturan bawaann nya si jetsream

            // ->ignore akan mengabaikan pencarian untuk email yang diberikan oleh user, artinya dia akan mengecek semua email yang ada di database, jika ditemukan 1 saja email maka dia akan memberikan respon bahwa email duplikat
            // 'password' => ['min:8', 'string', 'max:255'],
        ];
    }
}
