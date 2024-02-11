<?php

namespace App\Http\Requests\Room;

use App\DTOs\Room\UpdateDTO;
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
        if (in_array('update_room', auth()->user()->permissions->pluck('name')->toArray())) {
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
            'location'          => 'nullable|string|max:191',
            'google_location'   => 'nullable|string|max:191',
            'capacity'          => 'nullable|numeric|gte:1',
            'photos'            => 'nullable|array',
            'photos.*'          => 'image',
            'features'          => 'nullable|array',
            'attachment'        => 'nullable|file',
            'more_features'     => 'nullable|array',
            // 'status'            => 'nullable|in:1,2,3',
        ];
    }
}
