<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'title'                  => ['required', 'string'],
            'sku'                    => ['required', 'string'],
            'description'            => ['required', 'string'],
            'product_image'          => ['nullable', 'array'],
            'product_variant'        => ['required', 'array'],
            'product_variant_prices' => ['required', 'array'],
        ];
    }
}
