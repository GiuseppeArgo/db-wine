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
            'winery'=> 'required|string|min:3|max:255 ',
        'wine'=> 'required|string|min:3|max:255 ',
        'average'=> 'required|decimal:1',
        'reviews' => 'required|integer',
        'location'=> 'required|string|min:3|max:255 ',
        'image'=> 'nullable',
        ];
    }
    public function messages(): array {
        return[
        'winery.required' => 'Il nome della vineria è obligatoria',
        'winery.min' => 'Il nome della vineria deve contenere almeno 3 caratteri',
        'winery.max' => 'Il nome della vineria non può contenere più di 255 caratteri',
        'wine.required' => 'Il nome del vino è obligatoria',
        'wine.min' => 'Il nome del vino deve contenere almeno 3 caratteri',
        'wine.max' => 'Il nome del vino non può contenere più di 255 caratteri',
        'average.required'=>'La valutazione è obligatoria',
        'average.decimal'=>'La valutazione deve essere un decimale con solo un numero dopo la virgola',
        'reviews.required' => 'Il numero di recensione è obligatorio',
        'reviews.integer' => 'Il numero di recensioni deve essere intero',
        'location.min' => 'Il nome della provenienza deve contenere almeno 3 caratteri',
        'location.max' => 'Il nome della provenienza non può contenere più di 255 caratteri',
        'location.required' => 'Il nome della provenienza è obligatoria',
        ];
    }
}
