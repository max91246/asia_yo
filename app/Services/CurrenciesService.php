<?php

namespace App\Services;

/**
 * 
 * 匯率轉換service
 * 
**/
class CurrenciesService
{

    /**
     * 取得匯率轉換列表
     *
     * @return array
     */
    public function list(): array
    {
        
        $currencies = [
            'currencies' =>[
                'TWD' => [
                    'TWD' => 1,
                    'JPY' => 3.669,
                    'USD' => 0.03281,
                ],
                'JPY' => [
                    'TWD' => 0.26956,
                    'JPY' => 1,
                    'USD' => 0.00885,
                ],
                'USD' => [
                    'TWD' => 30.444,
                    'JPY' => 111.801,
                    'USD' => 1,
                ],
            ]
        ];

        return $currencies;
    }

}
