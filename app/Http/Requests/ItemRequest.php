<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
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
            'name_ar'=>'required|string',
            'name_en'=>'required|string',
            'name_ku'=>'required|string',
            'desc_ar'=>'required|string',
            'desc_en'=>'required|string',
            'desc_ku'=>'required|string',
            'category_id'=>'required|integer|exists:categories,id',
            'shop_id'=>'required|integer|exists:shops,id',
            'brand_id'=>'required|integer|exists:brands,id',
            'price'=>'required',
            'file'=>'required'
        ];
    }
}
