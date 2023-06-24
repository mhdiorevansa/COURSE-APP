<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email' => 'unique:users|max:50',
            'password' => 'min:6|max:50'
        ];
    }
    public function messages()
    {
        return [
            'email.unique' => 'Email already registered',
            'email.max' => 'Email cannot be longer than :max characters',
            'password.min' => 'Password minimum 6 characters',
            'password.max' => 'Password maximum 50 characters'
        ];
    }
}
