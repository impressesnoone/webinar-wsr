<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class ProductRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'category_id' => 'nullable',
            'count' => 'nullable',
            'is_published' => 'nullable',
            'photo_url' => 'required|file|mimes:jpg,jpeg,png',
            'title' => 'required',
            'cost' => 'required',
            'country' => 'required',
            'release_year' => 'required',
            'model' => 'required',
        ];
    }
}
