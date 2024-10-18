<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            //house and apartment
            'title' => 'required|max:50',
            'description' => 'required|string|max:256',
            'price' => 'required|numeric|max:999999999',
            'total_area' => 'required|numeric|max:999999999',
            'covered_area' => 'required|numeric|max:999999999',
            'rooms_number' => 'required|integer|max:999999999',
            //property
            'light' => 'boolean',
            'natural_gas' => 'boolean',
            'phone' => 'boolean',
            'water' => 'boolean',
            'sewers' => 'boolean',
            'internet' => 'boolean',
            'asphalt' => 'boolean',
        ];
    }
}
