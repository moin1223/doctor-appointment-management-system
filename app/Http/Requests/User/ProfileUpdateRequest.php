<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
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
            'address' => 'required|string',
            'division' => 'required|integer',
            'district' => 'required|integer',
            'phone' => 'required|min:6|max:16',   
        ];
    }
    public function messages()
{
    return [
  
        'address.required' => 'Please fill up address field.',
        'phone.required' => 'Please fill up contact field.',
        'division.required' => 'Please  select your division.',
        'district.required' => 'Please  select your district.', 
     
    ];
}
}
