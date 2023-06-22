<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DoctorFormRequest extends FormRequest
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
            'name' => 'required|string',
            'specialist' => 'required|string',
            'mobile_number' => 'required',
        ];
    }
    // public function messages()
    // {
    //     return [
      
    //         'name.required' => 'Please fill up role name field.',
         
    //     ];
    // }
    
}
