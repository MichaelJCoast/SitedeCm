<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => 'required',
            'body' => 'required',
            'portrait_image' => 'required|dimensions:ratio=1/1|max:1024',
            'landscaped_image' => 'required|dimensions:ratio=16/9|max:1024',
            'category_id' => 'required',
            'slug' => 'unique:posts,slug,' . \Request::get('id'), //slug é unique precisa de ser validada
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
            'title.required' => 'O post requer um título.',
            'body.required' => 'O post requer um corpo de texto.',
            'portrait_image.required' => 'O post requer uma imagem portrait.',
            'landscaped_image.required' => 'O post requer uma imagem landscaped.',
            'portrait_image.dimensions' => 'A imagem portrait deve ter as dimensões 1:1.',
            'landscaped_image.dimensions' => 'A imagem landscaped deve ter as dimensões 16:9.',
            'portrait_image.max' => 'A imagem portrait deve ter no máximo 1MB.',
            'landscaped_image.max' => 'A imagem landscaped deve ter no máximo 1MB.',
        ];
    }
}
