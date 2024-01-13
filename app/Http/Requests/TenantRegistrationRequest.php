<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class TenantRegistrationRequest extends FormRequest
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
    public function rules()
    {
        return [
            'company' => ['required', 'string', 'max:255'],
            'domain' => ['required', 'string', 'max:255', 'unique:domains'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'confirmed', Password::defaults()],
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'domain' =>  $this->domain . '.' . config('tenancy.central_domains')[0]
        ]);
    }
}
