<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class ProfileUpdateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['bail', 'required', 'string', 'max:255'],
            'phone' => ['bail', 'required', 'regex:/(01)[0-9]{9}$/', Rule::unique('user_profiles')->ignore(Auth::id(), 'user_id')],

            'password' => ['bail', 'nullable', 'string', 'confirmed', Password::min(8)->mixedCase()->symbols()],
        ];
    }
}
