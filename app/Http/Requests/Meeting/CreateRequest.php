<?php

namespace App\Http\Requests\Meeting;

use App\DTOs\Meeting\CreateDTO;
use Carbon\Carbon;
use Spatie\LaravelData\WithData;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class CreateRequest extends FormRequest
{
    use WithData;

    protected string $dataClass = CreateDTO::class;

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        if (in_array('create_meeting', auth()->user()->permissions->pluck('name')->toArray())) {
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
            'room_id'              => 'required|exists:rooms,id',
            'title'                => 'required|string',
            'brief'                => 'nullable|string',
            'description'          => 'nullable|string',
            'start_date'           => 'required|date|after_or_equal:today',
            'start_time'           => 'required',
            'end_time'             => 'required|after:start_time',
            'repeatable'           => 'nullable',
            'end_date'             => 'nullable|date|after:start_date',
            'status'               => 'nullable|in:1,2',
            'send_user_location'   => 'nullable',
            'send_room_attach'     => 'nullable',
            'send_room_properties' => 'nullable',
            'google_meet_link'     => 'nullable',
            'reminder_time'        => 'required|filled',
        ];
    }
}
