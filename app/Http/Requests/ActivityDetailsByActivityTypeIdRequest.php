<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActivityDetailsByActivityTypeIdRequest extends FormRequest
{
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
            'user_id'                        => 'required|exists:users,id',
            'activity_type_id'           => 'required|exists:activity_types,id',
            'distance_unit_id'          => 'required|exists:distance_units,id',
            'elapsed_time_unit_id'  => 'required|exists:elapsed_time_units,id',
            'name'                          => 'required|string|max:255',
            'distance'                      => 'required|numeric|min:0',
            'elapsed_time'              => 'required|numeric|min:0',
            'date'                            => 'required|date',
        ];
    }
}
