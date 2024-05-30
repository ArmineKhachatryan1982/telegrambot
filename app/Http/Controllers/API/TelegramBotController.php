<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Telegram\Bot\Api;
use Telegram\Bot\Laravel\Facades\Telegram;
class TelegramBotController extends Controller
{
    protected $telegram;
    public function __construct()
    {

        $this->telegram = new Api('7107824182:AAEpGRYcb1kMGvybkL8sG7tvFWYr0QqVfIw');
    }
    public function getMe(){

        $response = $this->telegram->getMe();
        return $response;
    }
    public function getChatInfo(Request $request){


            // Get chat ID from the request
            $chatId = $request->chat_id;
            // $chatId = $request->input('message.chat.id');

            // Fetch chat information using Telegram Bot SDK
            $chatInfo = Telegram::getChat(['chat_id' => $chatId]);

            // Fetch members count using Telegram Bot SDK
            $membersCount = Telegram::getChatMembersCount(['chat_id' => $chatId]);

            // Fetch administrators using Telegram Bot SDK
            $administrators = Telegram::getChatAdministrators(['chat_id' => $chatId]);

            // Prepare the detailed info message
            $infoMessage = sprintf(
                "Chat Info:\nID: %s\nType: %s\nTitle: %s\nUsername: %s\nMembers Count: %d\nAdministrators: %s\n",
                $chatInfo['id'],
                $chatInfo['type'],
                $chatInfo['title'],
                $chatInfo['username'],
                $membersCount,
                implode(', ', array_column($administrators, 'user.username'))
            );

            // Respond with the chat information
            return response()->json(['text' => $infoMessage]);
        }



    public function sendMessage(){

        $response = $this->telegram->sendMessage([
            'chat_id'=>-4280219646,
            'text'=>"from code"
        ]);
        
        return $response;

    }

}
