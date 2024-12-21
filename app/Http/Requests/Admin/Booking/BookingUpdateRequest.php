<?php

namespace App\Http\Requests\Admin\Booking;

use Illuminate\Foundation\Http\FormRequest;

class BookingUpdateRequest extends FormRequest
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
            'id_user' => 'sometimes',
            'id_kategori_booking' => 'required',
            'nama_kegiatan' => 'required',
            'tanggal_booking' => 'required',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required',
            'keterangan' => 'sometimes',
            'status' => 'required',
        ];
    }
}
