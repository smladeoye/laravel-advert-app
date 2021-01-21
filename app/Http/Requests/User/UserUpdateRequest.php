<?php


namespace App\Http\Requests\User;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserUpdateRequest extends FormRequest
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
            'name' => ['required', Rule::unique("users")->ignore($this->id)],
            'email' => ['required','email','regex:/^.+@.+$/i', Rule::unique("users")->ignore($this->id)],
            'password' => 'string|nullable|confirmed|min:8'
        ];
    }

}