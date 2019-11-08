<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFile extends FormRequest
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
            'user_id'=>"integer",
            'name' => 'required|string|max:255',
            'comment' => 'string',
            'file_name' => 'mimes:jpeg,bmp,png,jpg|max:5120',
            'delete_date'=> [

                function ($attribute, $value, $fail) {
                    if (!empty($value) && strtotime($value) < strtotime(date("Y-m-d"))) {
                        $fail('Delete date can not be less than today');
                    }
                },
            ]
        ];
    }
}
