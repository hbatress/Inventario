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
            'TypeID' => 'nullable|exists:asset_types,TypeID',
            'Description' => 'nullable|string|max:100',
            'Owner' => 'nullable|string|max:100',
            'AcquisitionDate' => 'nullable|date',
            'LocationID' => 'nullable|exists:locations,LocationID',
            'DepartmentID' => 'nullable|exists:departments,DepartmentID',
            'StatusID' => 'nullable|exists:statuses,StatusID',
            'ClassificationID' => 'nullable|exists:classifications,ClassificationID',
            'CriticalityID' => 'nullable|exists:criticality_levels,CriticalityID',
            'UserID' => 'nullable|exists:persons,UserID',
        ];
    }
}
