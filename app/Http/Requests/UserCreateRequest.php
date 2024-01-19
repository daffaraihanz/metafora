<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
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
            'email' => 'unique:users|required',
            'name' => 'required',
            'password' => 'required',
        ];
    }


    public function messages()
    {
        return [
            'email' => 'Mohon isi Email atau Email anda sudah terdaftar',
            'name.required' => 'Mohon isi Nama Lengkap anda',
            'password' => 'Mohon isi Password',
        ];
    }
}
