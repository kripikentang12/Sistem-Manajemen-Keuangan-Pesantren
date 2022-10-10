<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class SantriRequest extends FormRequest
{
    public $validator = null;

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
            'types'                  => 'required|string',
            'name'                   => 'required|string|min:5',
            'address'                => 'required|string|min:5',
            'birth_place'            => 'required|string|min:5',
            'birth_date'             => 'required|date',
            'phone'                  => 'required|string',
            'school_old'             => 'nullable|string',
            'school_address_old'     => 'nullable|string',
            'school_current'         => 'nullable|string',
            'school_address_current' => 'nullable|string',
            'father_name'            => 'nullable|string',
            'mother_name'            => 'nullable|string',
            'father_job'             => 'nullable|string',
            'mother_job'             => 'nullable|string',
            'parent_phone'           => 'nullable|string',
            'entry_year'             => 'nullable|digits:4',
            'year_out'               => 'nullable|digits:4',
            'photo'                  => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $this->validator = $validator;
    }
}
