<?php

namespace App\Http\Requests;

use App\DTOs\CreateRoomDTO;
use Spatie\LaravelData\WithData;
use Illuminate\Foundation\Http\FormRequest;

class CreateRoomRequest extends FormRequest
{
    use WithData;

    protected string $dataClass = CreateRoomDTO::class;

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
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
            'name' => 'required',
            'location' => 'required',
        ];
    }
}
