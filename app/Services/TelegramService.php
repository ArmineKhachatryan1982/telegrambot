<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;

class TelegramService
{
    protected $token;

    public function __construct()
    {
        $this->token=env('TELEGRAM_BOT_TOKEN');
    }
    public  function execute($method,$params = [])
    {
        // dd($method,$params,$this->token);
       $url = sprintf('https://api.telegram.org/bot%s/%s', $this->token,$method);
       $request =Http::post($url, $params);
       return $request->json('result',[]);
    }
    public function getUpdated(int $offset)
    {
        $response = $this->execute('getUpdates',[
            'offset'=>0
        ]);
        return $response;
    }
}
