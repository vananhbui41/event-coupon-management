<?php

namespace App\Http\Requests;

use App\Rules\CouponStartTimeCheck;
use App\Rules\Publictime;
use Illuminate\Foundation\Http\FormRequest;

class StoreCouponRequest extends FormRequest
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
            'code'=>'required|digits:10|unique:coupons',
            'title'=>'required',
            'name'=>'required',
            'summary'=>'required',
            'image'=>'required|image|max:2048',
            'public_date'=>[
                'required',
                new Publictime($this->start_time,$this->end_time),
            ],
            'start_time'=>[
                'required',
                new CouponStartTimeCheck($this->end_time),
            ],
            'end_time'=>'required',
        ];
    }

    public function messages() {
        return [
            'code.required' => '必須項目が入力されていません。',
            'code.digits:10' => '10桁の半角数字で入力してください。',
            'code.unique' => '入力されたクーポンコードアドレスは既に使用されています。',
            'title.required' => '必須項目が入力されていません。',
            'name.required' => '必須項目が入力されていません。',
            'summary.required' => '必須項目が入力されていません。',
            'image.required' => '必須項目が入力されていません。',
            'image.image' => '画像ファイルのみをアップロードしてください。',
            'image.max:2048' => '画像のサイズが２MB以下に入力してください。',
            'public_date.required' => '必須項目が入力されていません。',
            'start_time.required' => '必須項目が入力されていません。',
            'end_time.required' => '必須項目が入力されていません。',
        ];
    }
}
