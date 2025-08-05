<?php

namespace App\Http\Requests\Admin\Masters;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateSalestagRequest extends FormRequest
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
            'tagname' => ['required', Rule::unique('salestags')->whereNull('deleted_at')],
            'discount_rate' => 'required',
            'code' => 'required',
            'status' => 'required|in:1,2', // Assuming status can be 1 or 2
        ];
    }
}
