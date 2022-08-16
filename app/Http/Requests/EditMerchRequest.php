<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MerchRequest extends FormRequest
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
            'name' => 'required',
            'photo' => 'sometimes|required|max:1024',
            'description' => 'required',
            'price' => 'required',
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
            'name.required' => 'O nome do produto é obrigatório!',
            'description.required' => 'A descrição do produto é obrigatória!',
            'price.required' => 'O preço do produto é obrigatório!',
            'photo.required' => 'A foto do produto é obrigatória!',
            'photo.max' => 'A foto do produto tem que ter no máximo 1MB!',
        ];
    }
}
