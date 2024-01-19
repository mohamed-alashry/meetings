<?php

namespace App\Http\Requests\Invitee;

use App\DTOs\Invitee\UpdateDTO;
use Spatie\LaravelData\WithData;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    use WithData;

    protected string $dataClass = UpdateDTO::class;

    /**
     * Determine if the invitee is authorized to make this request.
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
    public function rules($invitee_id = null): array
    {
        if (!$invitee_id) {
            $invitee_id = $this->invitee;
        }
        return [
            'name'              => 'nullable|string|max:191',
            'email'             => 'nullable|email|unique:invitees,email,' . $invitee_id,
        ];
    }
}
