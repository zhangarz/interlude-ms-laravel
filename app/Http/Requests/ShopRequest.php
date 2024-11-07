<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShopRequest extends FormRequest
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
            'user_id'=>'required|integer|exists:users,id',
            'logo'=>'required|mimes:jpg,jpeg,png,webp',
            'address'=>'required'

        ];
    }
}
