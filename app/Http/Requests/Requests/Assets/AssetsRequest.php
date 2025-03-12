<?php

namespace App\Http\Requests\Requests\Assets;

use Illuminate\Foundation\Http\FormRequest;

class AssetsRequest extends FormRequest
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
            'Code' => 'required|string|max:50',
            'Name' => 'required|string|max:100',
            'TypeID' => 'nullable|exists:asset_types,TypeID',
            'LocationID' => 'nullable|exists:locations,LocationID',
            'DepartmentID' => 'nullable|exists:departments,DepartmentID',
            'StatusID' => 'nullable|exists:statuses,StatusID',
            'ClassificationID' => 'nullable|exists:classifications,ClassificationID',
            'CriticalityID' => 'nullable|exists:criticality_levels,CriticalityID',
            'ActionID' => 'nullable|exists:actions,ActionID',
            'CreatedBy' => 'nullable|exists:persons,UserID',
        ];
    }
}
