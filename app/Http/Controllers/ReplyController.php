<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reply;

class ReplyController extends Controller
{
     public function store(Reply $reply, Request $request) // 引数をRequestからPostRequestにする
    {
        $input = $request['reply'];
        $input['user_id'] = auth()->id();
        $reply->fill($input)->save();
        return redirect('/threads/' . $input['thread_id']);
    }
}
