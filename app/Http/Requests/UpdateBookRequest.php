<?php

namespace App\Http\Requests;

use App\Http\Requests\Trait\FailedValidationTrait;
use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
{
    use FailedValidationTrait;

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
            'title' => 'required|string|max:150',
            'author' => 'required|string|max:255',
            'short_description' => 'nullable|string',
            'number_available' => 'integer',
            'publication_year' => 'nullable|integer',
            'category_id' => 'nullable|exists:categories,id',
        ];
    }
}
