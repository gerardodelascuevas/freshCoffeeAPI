<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegistroRequest extends FormRequest
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
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => [
                'required',
                'confirmed',
                // Password::min(8)->letters()->symbols()->numbers()
                Password::min(5)->letters()->numbers()
                ]
        ];
    }

    public function messages(){
        return [
            'name'=> 'El nombre es requerido',
            'email'=> 'El email es requerido',
            'email.email' => 'Debes escribir un email valido',
            'email.unique'=> 'Ese usuario ya esta registrado',
            'password'=> 'El password debe contener al menos 5 caracteres, letras y numeros'
        ];
    }
}
