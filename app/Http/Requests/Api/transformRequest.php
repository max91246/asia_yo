<?php

namespace App\Http\Requests\Api;

class transformRequest extends BaseApiRequest
{
    public function rules()
    {
        return [
            'from' => 'required',
            'to'   => 'required',
            'amount' => 'required|numeric',
        ];
    }

    public function attributes()
    {
        return [
            'from' => '來源幣別',
            'to' => '目標幣別',
            'amount' => '金額數字',
        ];
    }
}
