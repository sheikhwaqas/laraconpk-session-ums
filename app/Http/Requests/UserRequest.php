<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (auth()->guest()) {
            return true;
        }

        return ($this->method() == 'POST') ? Gate::allows('create-user') : Gate::allows('update-user');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name' => 'required|max:255',
        ];

        if ($this->method() == 'PUT' || $this->method() == 'PATCH') {
            return array_merge($rules, $this->updateRules());
        }

        return array_merge($rules, $this->createRules());
    }

    protected function createRules()
    {
        return [
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ];
    }

    protected function updateRules()
    {
        $rules = [
            'email' => 'required|email|max:255|unique:users,id,' . $this->user->id,
        ];

        if (! is_null(request('password'))) {
            $rules['password'] = 'min:6|confirmed';
        }

        return $rules;
    }
}
