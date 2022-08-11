<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MandatoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
        return backpack_auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'year' => 'required|numeric|min:2010|max:2099',
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            //
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'year.required' => 'É necessário adicionar o ano do mandato!',
            'year.min' => 'O ano do mandato deve ser maior ou igual a 2010!',
            'year.max' => 'O ano do mandato não pode ser maior do que 2099!',
        ];
    }
}
