<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Telegram\Bot\Laravel\Facades\Telegram;

class BotController extends Controller
{

    public function handleWebhook(Request $request)
    {
        $update = Telegram::getWebhookUpdates();

        if (isset($update['inline_query'])) {
            $this->handleInlineQuery($update['inline_query']);
        }

        return response('OK');
    }

    protected function handleInlineQuery($inlineQuery)
    {
        $queryId = $inlineQuery['id'];
        $queryText = $inlineQuery['query'];

        // Prepare inline query results
        $results = [
            [
                'type' => 'article',
                'id' => '1',
                'title' => 'Result 1',
                'input_message_content' => [
                    'message_text' => 'This is the first result',
                ],
            ],
            [
                'type' => 'article',
                'id' => '2',
                'title' => 'Result 2',
                'input_message_content' => [
                    'message_text' => 'This is the second result',
                ],
            ],
        ];

        // Send results back to Telegram
        Telegram::answerInlineQuery([
            'inline_query_id' => $queryId,
            'results' => json_encode($results),
        ]);
    }

}
