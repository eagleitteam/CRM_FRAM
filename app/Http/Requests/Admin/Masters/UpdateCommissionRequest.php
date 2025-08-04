<?php

namespace App\Http\Requests\Admin\Masters;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCommissionRequest extends FormRequest
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
            'comm_type' => 'required',
            'rate_type' => 'required',
            'description' => 'required',
            'rate' => 'nullable|integer',
            'percent' => 'nullable|integer',
            'status' => 'required|in:1,2', // 1 for active, 2 for inactive
        ];
    }
}
