<?php

namespace App\Http\Requests\Admin\ChildCategory;

use Illuminate\Foundation\Http\FormRequest;

class UpdateChildCategoryRequest extends FormRequest
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
            'name' => 'required|max:200|unique:child_categories,name,'. request()->route('child_category')->id,
            'status' => 'required|in:active,inactive',
            'category_id' => 'required|exists:categories,id',
            'sub_category_id' => 'required|exists:sub_categories,id'
        ];
    }
}
