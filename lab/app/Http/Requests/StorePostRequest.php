<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class StorePostRequest extends FormRequest
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


            
    'title' => ['required', 'min:3','unique:posts'],
    'description' => ['required', 'min:5'],
    
        ];


    }

public function messages()
{
    return [
        'title.required' => 'this message is changed',
        'title.min' => 'minimum override message',
    ];
}}