<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePostRequest extends FormRequest
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
            Rule::unique('posts', 'title')->ignore($this->post),
    'description' => ['required', 'min:5'],
   
        ];

    }
  function messages()
{
    return [
        'title.required' => 'this message is changed',
        'title.min' => 'minimum override message',
    ];
}};