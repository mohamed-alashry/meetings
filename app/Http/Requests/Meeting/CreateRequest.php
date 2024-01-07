<?php

namespace App\Http\Requests\Meeting;

use App\DTOs\Meeting\CreateDTO;
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
            'room_id'           => 'required|exists:rooms,id',
            'title'             => 'required|string|max:191',
            'brief'             => 'required|string|max:191',
            'description'       => 'required|string|max:191',
            'start_date'        => 'required|date',
            'duration'          => 'required|numeric|gte:1',
            'end_date'          => 'required|date|after:start_date',
            'status'            => 'required|in:1,2,3',
        ];
    }
}
