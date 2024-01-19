<?php

namespace App\Http\Requests\User;

use App\DTOs\User\CreateDTO;
use Spatie\LaravelData\WithData;
use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    use WithData;

    protected string $dataClass = CreateDTO::class;

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
            'name'              => 'required|string|max:191',
            'role_name'         => 'required|string|max:191',
            'email'             => 'required|email|unique:users',
            'password'          => 'required|confirmed|min:6',
            'permissions'       => 'nullable|array',
        ];
    }
}
