<?php


namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'first_name' => 'required|string|min:3',
            'last_name' => 'required|string',
            'email' => "required|unique:users,email,$this->id,id"
            
        ];
    }
    public function messages()
{
    return [
  
        'first_name' => 'Please fill up first name field.',
        'last_name.required' => 'Please fill up last name field.',
        'email.required' => 'Please fill up email field.',

    ];
}
}
