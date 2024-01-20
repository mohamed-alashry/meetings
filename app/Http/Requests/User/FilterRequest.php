<?php

namespace App\Http\Requests\User;

use App\DTOs\User\FilterDTO;
use Spatie\LaravelData\WithData;
use Illuminate\Foundation\Http\FormRequest;

class FilterRequest extends FormRequest
{
    use WithData;

    protected string $dataClass = FilterDTO::class;

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        if (in_array('read_user', auth()->user()->permissions->pluck('name')->toArray())) {
            return true;
        }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'              => 'nullable|string|max:191',
            'email'             => 'nullable|email',
            'password'          => 'nullable|confirmed|min:6',
        ];
    }
}
