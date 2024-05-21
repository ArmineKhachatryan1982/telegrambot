<?
namespace App\Telegram;
use DefStudio\Telegraph\Handlers\WebhookHandler;
class Handler extends WebhookHandler{
    public function hello(){

        $this->reply('hello, it is your first bot in laravel');
    }

}
