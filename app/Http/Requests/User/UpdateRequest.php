<?php

namespace App\Http\Requests\User;

use App\DTOs\User\UpdateDTO;
use Spatie\LaravelData\WithData;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    use WithData;

    protected string $dataClass = UpdateDTO::class;

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        if (in_array('update_user', auth()->user()->permissions->pluck('name')->toArray())) {
            return true;
        }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules($user_id = null): array
    {
        if (!$user_id) {
            $user_id = $this->user;
        }

        return [
            'name'              => 'nullable|string|max:191',
            'role_name'         => 'required|string|max:191',
            'email'             => 'nullable|email|unique:users,email,' . $user_id,
            'password'          => 'nullable|confirmed|min:6',
            'permissions'       => 'nullable|array',
        ];
    }
}
