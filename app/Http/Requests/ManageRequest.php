<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ValidPhone;

class ManageRequest extends FormRequest
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
            'employee' => 'required|min:5',
            'location' => 'required|min:5',
            'department_id' => 'required',
            'email' => 'required|min:5|email',
            'phone_1' => ['required', new ValidPhone],
            'phone_2' => [new ValidPhone]
        ];
    }
}
