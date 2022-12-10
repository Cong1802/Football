<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PitchTypeRQ extends FormRequest
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
            'pitch_type_parent' => 'required',
            'pitch_type' => 'required',
        ];
    }
    // public function messages()
    // {
    //     return [
    //         'pitch_type_file.required' => 'Vui lòng chọn hình ảnh sân',
    //         'pitch_type_file.max' => 'Ảnh đăng tải không vượt quá 2048kb',
    //         'pitch_type_file.mimes' => 'Vui lòng đúng định dạng ảnh',
    //         'pitch_type_parent.required' => 'Vui lòng chọn địa điểm',
    //         'pitch_type.required' => 'Vui lòng chọn loại sân',
    //     ];
    // }
}
