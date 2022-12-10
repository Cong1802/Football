<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PriceTime extends FormRequest
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
            'time_end' => 'after:time_st',
            'pitch' => 'required',
            // 'pitch_type' =>'required',
        ];
    }
    public function messages()
    {
        return [
            'time_end.after' => 'Thời gian kết thúc phải lớn hơn thời gian bắt đầu',
            'pitch.required' => 'Địa điểm không được bỏ trống',
            // 'pitch_type.required' => 'Loại sân không được bỏ trống',
        ];
    }
}
