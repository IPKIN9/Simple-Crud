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
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ];

        // Check if the request is for updating an existing user
        if ($this->isMethod('PUT') || $this->isMethod('PATCH')) {
            $userId = $this->route('user') ? $this->route('user-update')->id : null;
            $rules['email'] = [
                'required',
                'string',
                'email',
                'max:255'
            ];
        }

        return $rules;
    }

}
