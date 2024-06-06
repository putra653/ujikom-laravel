<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequestUpdate extends FormRequest
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
        'nama_perusahaan' => 'nullable',
        'foto_perusahaan' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'telepon' => 'nullable|max:12',
        'nib' => 'nullable|max:16', 
        'web' => 'nullable',
        'alamat' => 'nullable|max:255',
        'kodepos' => 'nullable|max:11',
        'batas_pinjam' => 'nullable|max:4'
    ];
}

}
