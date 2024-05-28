<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\File\File;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'username' => ['required', 'regex:/^\w+$/', 'string', 'max:20', Rule::unique(User::class)->ignore($this->user()->id)],
            'location' => ['string', 'max:255'],
            'bio' => ['string', 'max:255'],
            'profile_img' => ['file', 'nullable', Rule::imageFile()->min('1kb')->max('1mb')],
        ];
    }

    public function messages() {
        return [
            'profile_img.between' => 'Maaf, max upload gambar adalah 1mb',
            'profile_img.image' => 'File yang kamu upload bukan gambar!',
            'username' => 'Format username tidak valid. Karakter yang boleh digunakan "huruf, angka dan _"',
            'email' => 'Format penulisan Email tidak valid',
            'required' => "Input tidak boleh kosong!"
        ];
    }
}
