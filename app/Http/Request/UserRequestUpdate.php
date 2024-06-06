<?php

namespace App\Http\Requests\Request;

use Illuminate\Foundation\Http\FormRequest;

class UserRequestUpdate extends FormRequest
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
            'name' => 'nullable|string|max:25',
            'telepon' => 'nullable|string|max:255',
            'alamat' => 'nullable|min6',
            'email' => 'nullable|',
            'role' => 'nullable|',
            'password' => 'sometimes|nullable|string|min:8|comfirmed',
            'password_confirmation' => 'sometimes|nullable|min:8'
        ]; 
    }
}
