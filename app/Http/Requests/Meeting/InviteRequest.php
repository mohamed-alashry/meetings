<?php

namespace App\Http\Requests\Meeting;

use App\DTOs\Meeting\InviteDTO;
use Spatie\LaravelData\WithData;
use Illuminate\Foundation\Http\FormRequest;

class InviteRequest extends FormRequest
{
    use WithData;

    protected string $dataClass = InviteDTO::class;

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        if (in_array('invite_to_meeting', auth()->user()->permissions->pluck('name')->toArray())) {
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
            'meeting_id'    => 'required|exists:meetings,id',
            'userable_id'   => 'required',
            'userable_type' => 'required',
            'type'          => 'required|in:1,2',
            'status'        => 'required|in:1,2,3',
        ];
    }
}
