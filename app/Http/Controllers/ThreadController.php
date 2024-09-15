<?php

namespace App\Http\Controllers;

use App\Models\Thread;
use App\Models\Reply;
use App\Http\Requests\ThreadRequest;

class ThreadController extends Controller
{
    public function index(Thread $thread)
    {
        return view('threads.index')->with(['threads' => $thread->getPaginateByLimit()]);
    }

    public function show(Thread $thread, Reply $reply)
    {
        $replies = Reply::where('thread_id', $thread->id)->get();
        return view('threads.show')->with(['thread' => $thread, 'replies' => $replies]); 
    }

    public function create()
    {
        return view('threads.create');
    }

    public function store(Thread $thread, ThreadRequest $request) // 引数をRequestからPostRequestにする
    {
        $input = $request['thread'];
        $input['user_id'] = auth()->id();
        $thread->fill($input)->save();
        return redirect('/threads/' . $thread->id);
    }
    
    public function edit(Thread $thread)
    {
        return view('threads.edit')->with(['thread' => $thread]);
    }
    
    public function update(ThreadRequest $request, Thread $thread)
    {
        $input_thread = $request['thread'];
        $thread->fill($input_thread)->save();

        return redirect('/threads/' . $thread->id);
    }
    public function delete(Thread $thread)
    {
        $thread->delete();
        return redirect('/');
    }
}