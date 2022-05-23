<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostProjectRequest extends FormRequest
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
            'projectName' => 'required|max:128',
            'groupSize' => 'required|integer|numeric|min:1',
            'groupCount' => 'required|integer|numeric|min:1'
        ];
    }
}
