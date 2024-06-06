<?php

namespace App\Http\Requests\request;

use Illuminate\Foundation\Http\FormRequest;

class simpananRequestUpdate extends FormRequest
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
            'kode_simpanan_debet' => 'nullable',
            'anggota_kode' => 'nullable',
            'tanggal' => 'nullable',
            'jenis_pembayaran' => 'nullable', 
            'transaksi' => 'nullable',
            'divisi' => 'nullable',
            'nominal' => 'nullable',
            'keterangan' => 'nullable',
            'status_buku' => 'nullable', 
            'status' => 'nullable'
        ];
    }
}
