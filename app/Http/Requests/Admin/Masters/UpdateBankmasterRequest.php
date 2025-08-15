<?php

namespace App\Http\Requests\Admin\Masters;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBankmasterRequest extends FormRequest
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
            'act_type' => 'required',
            'Bank_Name' => 'required',
            'BankBranch' => 'required',
            'BankAccountNo' => 'required',
            'BankIFSCCode' => 'required',
            'Remark' => 'nullable',
        ];
    }
}
