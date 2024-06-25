<?php

namespace App\Http\Requests\Meeting;

use App\DTOs\Meeting\FilterDTO;
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
        if (auth()->guest() || in_array('read_meeting', auth()->user()->permissions->pluck('name')->toArray())) {
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
            'room_id'           => 'nullable|exists:rooms,id',
            'title'             => 'nullable|string|max:191',
            'brief'             => 'nullable|string|max:191',
            'description'       => 'nullable|string|max:191',
            'start_date'        => 'nullable|date',
            'duration'          => 'nullable|numeric|gte:1',
            'end_date'          => 'nullable|date|after:start_date',
            'status'            => 'nullable|in:1,2,3',
        ];
    }
}
