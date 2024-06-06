<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:25',
            'email' => 'required|',
            'alamat' => 'required|min6',
            'telepon' => 'required|string|max:255',
            'level' => 'required',
            'password' => 'sometimes|required|string|min:8|comfirmed',
            'password_confirmation' => 'sometimes|required|min:8'
        ];
    }
}
