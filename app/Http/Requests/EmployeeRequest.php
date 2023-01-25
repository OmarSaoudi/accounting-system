<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
            'date_birth' => 'required|date|date_format:Y-m-d',
            'joining_date' => 'required|date|date_format:Y-m-d',
            'address' => 'required',
            'phone' => 'required',
            'activity' => 'required',
            'nif' => 'required|min:6',
            'nic' => 'required|min:6',
            'rcn' => 'required|min:6',
            'art' => 'required|min:6',
            'gender_id' => 'required',
            'wilaya_id' => 'required',
            'department_id' => 'required',
        ];
    }
}
