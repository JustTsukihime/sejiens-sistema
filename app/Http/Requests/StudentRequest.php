<?php

namespace App\Http\Requests;

use App\Rules\Phone;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StudentRequest extends FormRequest
{
    protected $redirect = '/#pieteikties';
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
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|email|unique:students',
            'phone' => ['required', 'min:8', new Phone(), 'unique:students'],
            'tshirt' => ['required', Rule::in(['XS','S','M','L','XL','XXL'])],
            'whatsapp' => ['required', Rule::in(['yes','no'])],
        ];
    }
}
