<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ValidInn;

class IdentificationNumberRequest extends FormRequest
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
            'inn' => [
              'required',
              'digits:12',
              new ValidInn,
            ],
        ];
    }

    public function attributes()
    {
        return [
         'inn' => 'ИНН',
       ];
    }

    public function messages()
    {
        return [
         '*.required' => 'Поле :attribute должно быть заполнено.',
         '*.digits' => 'Значение поля :attribute должно состоять из 12 цифр.',
       ];
    }
}
