<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Services\CurrenciesService;
use App\Http\Requests\Api\transformRequest;
use Illuminate\Support\Facades\Response;

class ExchangeRateController extends Controller
{

    protected $currenciesService;

    public function __construct(CurrenciesService $currenciesService)
    {
        $this->currenciesService = $currenciesService;
    }

    /**
     * 匯率轉換
     * 
     * transformRequest 較驗來源幣種，目標幣種，金額數字
     * 
     */
    public function transform(transformRequest $request)
    {

        //取得匯率轉換列表
        $currencies = $this->currenciesService->list();

        $post = $request->post();
        
        //幣種參數不存在的情況
        if (!isset($currencies['currencies'][$post['from']]) || !isset($currencies['currencies'][$post['to']]) ){
            return Response::jsonError('幣種參數不合法！');
        }
        
        //先拿出歸屬的幣種來源
        $from_currencies = $currencies['currencies'][$post['from']];

        //金額*幣種轉換 四捨五入 取小數點兩位
        $camount = round($post['amount'] * $from_currencies[$post['to']], 2);

        //逗點分隔千分位
        $camount = number_format($camount,2,'.',',');

        $response = [
            'from_currencies' => $from_currencies,
            'camount' => $camount
        ];

        return Response::jsonSuccess('请求成功！', $response);
    }
}
