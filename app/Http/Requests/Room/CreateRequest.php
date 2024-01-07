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
            'name'              => 'required|string|max:191',
            'location'          => 'required|string|max:191',
            'google_location'   => 'required|string|max:191',
            'capacity'          => 'required|numeric|gte:1',
            'status'            => 'required|in:1,2,3',
        ];
    }
}
