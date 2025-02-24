<?php

namespace App\Http\Requests\Vendor\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'thump_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required',
            'category_id' => 'required|exists:categories,id',
            'subcategory_id' => 'nullable|exists:sub_categories,id',
            'childcategory_id' => 'nullable|exists:child_categories,id',
            'brand_id' => 'exists:brands,id',
            'type' => 'required|in:new,best,top,featured',
            'sku' => 'required|string',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'offer_price' => 'nullable|numeric|min:0',
            'offer_start_date' => 'nullable|date',
            'offer_end_date' => 'nullable|date',
            'description' => 'nullable|string|max:600',
            'seo_title' => 'nullable|string',
            'seo_description' => 'nullable|string|max:600',
            'status' => 'nullable|in:active,archive',
        ];
    }
}
