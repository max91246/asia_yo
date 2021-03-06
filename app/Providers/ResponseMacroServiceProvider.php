<?php

namespace App\Providers;

use App\Services\AesService;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;

class ResponseMacroServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Response::macro('jsonSuccess', function ($message = '', $data = [], $status = 200) {
            $response = [
                'code' => $status,
                'msg' => $message,
                'data' => $data,
            ];

            return Response::json($response, $status);
        });

        Response::macro('jsonError', function ($message = '', $status = 400) {
            $response = [
                'code' => $status,
                'msg' => $message,
            ];

            return Response::json($response, $status);
        });
    }
}
