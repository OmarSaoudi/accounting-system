<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccountantRequest extends FormRequest
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
            'name' => 'required',
            'name_en' => 'required',
            'email' => 'required|email|unique:accountants,email,'.$this->id,
            'password' => 'required|string|min:6|max:10',
            'date_birth' => 'required|date|date_format:Y-m-d',
            'joining_date' => 'required|date|date_format:Y-m-d',
            'address' => 'required',
            'phone' => 'required|min:8',
            'gender_id' => 'required',
            'wilaya_id' => 'required',
        ];
    }
}
