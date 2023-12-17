<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'role' => 'required|integer',
            'email' => 'required|string|email|unique:users,email,' . $this->user_id,
            'user_id' => 'required|integer|exists:users,id',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Поле логина пользователя должно быть заполнено',
            'name.string' => 'Логин не может состоять из одних цифр',
            'email.required' => 'Поле email должно быть заполнено',
            'email.email' => 'Поле email дожно соответствовать формату',
            'email.unique' => 'Пользователь с таким email уже существует',
        ];
    }
}
