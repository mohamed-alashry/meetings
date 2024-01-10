<?php

namespace App\Http\Requests\User;

use App\DTOs\User\LoginUserDTO;
use Spatie\LaravelData\WithData;
use Illuminate\Foundation\Http\FormRequest;

class LoginUserRequest extends FormRequest
{
    use WithData;

    protected string $dataClass = LoginUserDTO::class;

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
            'email'     => 'required|email',
            'password'  => 'required|min:6',
        ];
    }
}
