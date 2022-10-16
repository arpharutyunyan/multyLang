<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
        $rules = [
            'parent_id' => 'integer',
        ];

        $locales = config('translatable.locales')::all();
        foreach ($locales as $locale){
            $rules[$locale['code'].'.title'] = 'required|string';
        }

        return $rules;
    }
}
