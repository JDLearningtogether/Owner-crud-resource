<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class OwnerRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'owner_name' => 'required|string|max:255',

            'phone' => [
                'nullable',
                'regex:/^0[0-9]{9}$/',
                'max:30',
            ],

            'email'   => 'nullable|email|max:255',
            'address' => 'nullable|string',
            'status'  => 'nullable|boolean',
        ];
    }
    public function messages(): array
    {
        return [
            'owner_code.required' => 'กรุณากรอกรหัสเจ้าของกิจการ',
            'owner_code.unique'   => 'รหัสเจ้าของกิจการนี้มีอยู่แล้ว',

            'owner_name.required' => 'กรุณากรอกชื่อเจ้าของกิจการ',

            'phone.regex' => 'กรุณากรอกเบอร์โทรศัพท์ให้ถูกต้อง เช่น 0812345678',
            'phone.max'   => 'เบอร์โทรศัพท์ต้องไม่เกิน 30 ตัวอักษร',

            'email.email' => 'กรุณากรอก Email ให้ถูกต้อง',
        ];
    }
}
