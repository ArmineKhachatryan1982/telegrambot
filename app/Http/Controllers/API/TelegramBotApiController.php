<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\TelegramService;
use Illuminate\Http\Request;

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

        dd($this->telegramService->);

    }
}
