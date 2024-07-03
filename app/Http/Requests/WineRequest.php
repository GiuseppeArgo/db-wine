<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WineRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'winery'=> 'required|string|min:3|max255 ',
        'wines'=> 'required|string|min:3|max255 ',
        'average'=> 'required|decimal:1',
        'reviews' => 'required|integer',
        'location'=> 'required|string|min:3|max255 ',
        'image'=> 'nullable',
        ];
    }
}
