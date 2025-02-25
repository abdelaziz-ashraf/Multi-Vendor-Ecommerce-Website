<?php

namespace App\Http\Requests\Vendor\Produt;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVariantItemRequest extends FormRequest
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
            'name' => 'required|string|max:200',
            'price' => 'required|numeric|min:0',
            'status' => 'required|in:active,inactive',
            'is_default' => 'required|boolean',
        ];
    }
}
