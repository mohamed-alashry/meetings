<?php

namespace App\Http\Requests\Meeting;

use App\DTOs\Meeting\UpdateDTO;
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
        if (in_array('update_meeting', auth()->user()->permissions->pluck('name')->toArray())) {
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
            'room_id'           => 'required|exists:rooms,id',
            'title'             => 'required|string',
            'brief'             => 'nullable|string',
            'description'       => 'nullable|string',
            'minutes'           => 'nullable|string',
            'minutes_attach'    => 'nullable|file|max:5120',
            'start_date'        => 'required|date|after_or_equal:today',
            'start_time'        => 'required',
            'end_time'          => 'required|after:start_time',
            'repeatable'        => 'required',
            'end_date'          => 'nullable',
            'status'            => 'nullable|in:1,2,3',
        ];
    }
}
