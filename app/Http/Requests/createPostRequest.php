<?php

namespace App\Http\Requests;

use App\Rules\uppercase;
use Illuminate\Foundation\Http\FormRequest;

class createPostRequest extends FormRequest
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
            'title' => ['required'],
            // 'title'=>['required',new uppercase()],
            'description' => 'required|min:10',
            'file' => ['required','mimes:jpeg,jpg,png','max:1000']
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'وارد کردن عنوان الزامی است',
            'description.min' => 'طول توضیحات کم است',
            'description.required' => 'توضیحات الزامی است',
            'file.required' => 'ارسال تصویر الزامی است',
            'file.max' => 'حجم عکس حداکثر باید 1 مگابایت باشد',
            'file.mimes' => 'فرمت عکس باید png یا jpeg و یا jpg باشد',
            'uploaded'=>'فابل آپلود نشد !'
        ];
    }
}
