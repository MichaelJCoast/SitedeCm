<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AboutImageRequest extends FormRequest
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
            'image' => 'sometimes|required|dimensions:min_width=1920, min_height=1080|max:1024',
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
            'image.required' => 'A imagem é obrigatória.',
            'image.dimensions' => 'A imagem tem que ter as dimensões máximas de 1920x1080 e mínimas de 1920x1080.',
            'image.max' => 'A imagem tem que ter no máximo 1MB.',
        ];
    }
}
