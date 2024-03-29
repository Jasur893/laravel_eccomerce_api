<?php

namespace App\Http\Requests;

use http\Params;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserAddressRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'latitude' => 'required',
            'longitude' => 'required',
            'region' => 'required',
            'district' => 'required',
            'street' => 'required',
            'home' => 'nullable',
        ];
    }
}
