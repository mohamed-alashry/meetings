<?php

namespace App\Http\Requests\Room;

use App\DTOs\Room\FilterDTO;
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
            'name'              => 'nullable|string|max:191',
            'location'          => 'nullable|string|max:191',
            'google_location'   => 'nullable|string|max:191',
            'capacity'          => 'nullable|numeric|gte:1',
            // 'status'            => 'nullable|in:1,2,3',
        ];
    }
}
