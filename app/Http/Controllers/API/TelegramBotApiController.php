<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\TelegramService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TelegramBotApiController extends Controller
{
    protected $token;
    public $telegramService;
    public function __construct(TelegramService $telegramService)
    {
        $this->telegramService=$telegramService;
    }
    public function getUpdates()
    {
        $url = sprintf('https://api.telegram.org/bot%s/%s', $this->telegramService,'getUpdates');
        $request =Http::post($url);
        return $request->json('result',[]);


       

    }
}
