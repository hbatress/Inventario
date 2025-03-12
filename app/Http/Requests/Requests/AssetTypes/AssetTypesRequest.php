<?php

namespace App\Http\Requests\Requests\AssetTypes;

use Illuminate\Foundation\Http\FormRequest;

class AssetTypesRequest extends FormRequest
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
            'TypeName' => 'required|string',
        ];
    }
}
