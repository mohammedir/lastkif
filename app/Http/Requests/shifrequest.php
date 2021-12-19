<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class shifrequest extends FormRequest
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
            //
            'namePage_ar' => 'required',
            'namePage_en' => 'required',
        ];
    }

    public function messages()
    {
        return[
            'namePage_ar.required' => trans('validation.required'),
            'namePage_ar.unique' => trans('validation.unique'),
            'namePage_en.required' => trans('validation.required'),
            'namePage_en.unique' => trans('validation.unique'),
        ];
    }
}
