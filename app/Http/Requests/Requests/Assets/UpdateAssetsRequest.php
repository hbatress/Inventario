<?php

namespace App\Http\Requests\Requests\Assets;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAssetsRequest extends FormRequest
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
            'Code' => 'nullable|string|max:50',
            'Name' => 'nullable|string|max:100',
            'TypeID' => 'nullable|integer',
            'LocationID' => 'nullable|integer',
            'DepartmentID' => 'nullable|integer',
            'StatusID' => 'nullable|integer',
            'ClassificationID' => 'nullable|integer',
            'CriticalityID' => 'nullable|integer',
            'ActionID' => 'nullable|integer',
            'UserID' => 'nullable|integer',
        ];
    }
}
