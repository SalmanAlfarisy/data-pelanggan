<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PelangganCreateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
                'name' => 'required',
                'no_telpon' => 'required|max:15',
                'nik' => 'size:16|required',
                'no_kk' => 'size:16|required',
                'img_npwp' => 'image|mimes:jpeg,png,jpg,gif|max:3048',
                'img_ktp' => 'image|mimes:jpeg,png,jpg,gif|max:3048',
                'img_kk' => 'image|mimes:jpeg,png,jpg,gif|max:3048',
                'buku_nikah' => 'image|mimes:jpeg,png,jpg,gif|max:3048',
                'merk_id' => 'required',
                'type_id' => 'required',

        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Nama',
            'no_telpon' => 'Nomor Telepon',
            'nik' => 'NIK',
            'img_npwp' => 'Foto NPWP',
            'img_ktp' => 'Foto KTP',
            'img_kk' => 'Foto KK',
            'buku_nikah' => "Foto Buku Nikah",
            'merk_id' => 'Merk Mobil',
            'type_id' => 'Type Mobil'
        ];
    }

    public function messages()
    {
       return[
            'name.required' => 'Kolom Nama Wajib di Isi!',
            'no_telpon.required' => 'Kolom Nomor Telepon Wajib di Isi!',
            'nik.required' => 'Kolom NIK Wajib di Isi!',
            'img_npwp.required' => 'Kolom Foto NPWP Wajib di Isi!',
            'img_ktp.required' => 'Kolom Foto KTP Wajib di Isi!',
            'img_kk.required' => 'Kolom Foto KK Wajib di Isi!',
            'merk_id.required' => 'Kolom Merk Mobil Wajib di Isi!',
            'type_id.required' => 'Kolom Type Mobil Wajib di Isi!',

            //Max
            'no_telpon.max' => "Nomor Telepon Maximal 15 digit",

            //Size
            'nik.size' => 'NIK harus berjumlah :size digit',
            'no_kk.size' => 'No KK harus berjumlah :size digit'
       ];
    }
}
