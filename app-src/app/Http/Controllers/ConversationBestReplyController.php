<?php

namespace App\Http\Controllers;

use App\Reply;

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Gate;

class ConversationBestReplyController extends Controller
{
    public function store(Reply $reply)
    {
        // authorize that the current user has permission to set the best reply
        // for the conversation
        // if (Gate::denies('update-conversation', $reply->conversation)) {
        //     // handle if not allowed
        // }
        // if (Gate::allows('update-conversation', $reply->conversation)) {
        //     // handle if allowed
        // }
        // $this->authorize('update-conversation', $reply->conversation);
        $this->authorize('update', $reply->conversation); // this policy has been defined at ConversationPolicy
        // $conversation = $reply->conversation;
        // $this->authorize('update', $conversation);
        
        // then set it
        // $reply->conversation->best_reply_id = $reply->id;
        // $reply->conversation->save();
        // $conversation->best_reply_id = $reply->id;
        // $conversation->save();
        $reply->conversation->setBestReply($reply);

        // redirect back to the conversation page
        return back();

    }
}
