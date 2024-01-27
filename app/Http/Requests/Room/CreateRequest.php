<?php

namespace App\Http\Requests\Room;

use App\DTOs\Room\CreateDTO;
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
        if (in_array('create_room', auth()->user()->permissions->pluck('name')->toArray())) {
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
            'name'              => 'required|string|max:191',
            'location'          => 'required|string|max:191',
            'google_location'   => 'required|string|max:191',
            'capacity'          => 'required|numeric|gte:1',
            'photos'            => 'required|array',
            'photos.*'          => 'image',
            'features'          => 'nullable|array',
            'attachment'        => 'required|file',
            // 'status'            => 'required|in:1,2,3',
        ];
    }
}
