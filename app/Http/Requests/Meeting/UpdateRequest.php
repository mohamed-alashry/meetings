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
            'title'             => 'required|string|max:191',
            'brief'             => 'required|string|max:191',
            'description'       => 'nullable|string|max:191',
            'start_date'        => 'required|date|after:yesterday',
            'start_time'        => 'required|date_format:H:i:s',
            'repeatable'        => 'required',
            'person_capacity'   => 'required|numeric|gte:1',
            'duration'          => 'required|numeric|gte:1',
            'end_date'          => 'nullable|date|after:start_date',
            'status'            => 'nullable|in:1,2,3',
        ];
    }
}
