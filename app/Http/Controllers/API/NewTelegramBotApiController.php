<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\TelegramService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class NewTelegramBotApiController extends Controller
{
    public $telegramService;
    public function __construct(TelegramService $telegramService)
    {
        $this->telegramService=$telegramService;
    }
    public function getUpdates()
    {
        $url = sprintf('https://api.telegram.org/bot%s/%s',env('telegram_bot_token'),'getUpdates');
        $request =Http::post($url);
        return $request->json('result',[]);
    }
}
