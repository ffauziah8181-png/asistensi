<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreItemRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'name'        => trim(strip_tags($this->name)),
            'description' => trim(strip_tags($this->description)),
        ]);
    }

    public function rules(): array
{
    return [
        'name'        => 'required|string|max:255',
        'description' => 'nullable|string',
        'price'       => 'required|numeric',
        'stock'       => 'required|integer',
        'category_id' => 'required|exists:categories,id',
    ];
}
}
