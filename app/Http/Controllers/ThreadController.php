<?php

namespace App\Http\Controllers;

use App\Models\Thread;
use App\Models\Incident;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ThreadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->id == null){
            $thread = new Thread();

            $thread->incident_id = $request->incident_id;
            $thread->user_id = Auth::id();
        }else{
            $thread = Thread::find($request->id);
        }

        $thread->status_id = $request->status_id;
        $thread->title = $request->title;
        $thread->body = $request->body;
        
    
        $thread->save();

        $incident = $thread->incident;

        return redirect()->route('incidents.detail', ['id' => $incident->id]);
        // return view('incidents.detail', compact('incident'));
    }


    public function show(Thread $thread)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $thread=Thread::find($id);
        $incident=$thread->incident;

        return view('threads.edit', compact('incident','thread'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Thread $thread)
    {
        $thread = Thread::find($request->id);
        $thread->title = $request->title;
        $thread->body = $request->body;
        $thread->status_id = $request->status_id;
        $thread->save();

        $incident = $thread->incident;

        return view('incidents.detail', compact('incident'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function destroy(Thread $thread)
    {
        //
    }
}
