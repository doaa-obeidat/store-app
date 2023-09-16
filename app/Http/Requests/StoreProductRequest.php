<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', Rule::unique('products', 'name')->ignore($this->product_id)],
            'description' => ['required'],
            'price' => ['required', 'numeric'],
            'qty' => ['required', 'numeric', 'integer'],
            'image' => ['required', 'image', 'mimes:jpg,png']
        ];
    }

    public function messages()
    {
        return [
          'name.required' => "Please enter the product name."
        ];
    }
}
