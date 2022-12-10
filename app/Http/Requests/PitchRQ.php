<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PitchRQ extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'pitch_manager' => 'required',
            'pitch_city' => 'required',
            'pitch_district' => 'required',
            'pitch_ward' => 'required',
            'pitch_street' => 'required',
        ];
    }
}
