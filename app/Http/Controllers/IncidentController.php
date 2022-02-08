<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Incident;
use App\Models\Thread;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class IncidentController extends Controller
{
    public function __construct()
    {
        //   $this->middleware(['auth', 'verified'])->only(['create', 'unlike']);
    }

    public function index()
    {
        $incidents = Incident::select()->latest()->paginate(12);

        return view('incidents.index', compact('incidents'));
    }

    public function detail($id)
    {
        $incident = Incident::find($id);
        $thread = new Thread();

        return view('incidents.detail', compact('incident', 'thread'));
    }

    public function new()
    {
        return view('incidents.new');
    }


    public function store(Request $request)
    {
        //インシデント：新規登録
        if ($request->id == null) {
            $incident = new Incident();
            $incident->user_id = Auth::id();

            //インシデント：更新
        } else {
            $incident = Incident::find($request->id);
        }

        $incident->status_id = $request->status_id;
        $incident->title = $request->title;
        $incident->body = $request->body;
        $incident->save();

        // return view('incidents.detail', compact('incident'));
        // return redirect()->route('incidents.detail', ['id' => $incident->id]);
        return redirect()->back();
    }


    // #インシデント：非同期(Ajax)
    public function ajax_store(Request $request)
    {
        $incident = new Incident();
        $incident->title = $request->title;
        $incident->body = $request->body;
        $incident->status_id = 0;
        $incident->user_id = Auth::id();
        $incident->save();

        return response()->json([
            'title' => $incident->title,
            'body' => $incident->body,
            'message' => 'ok',
        ], 200, [], JSON_UNESCAPED_UNICODE);
    }


    public function destroy(Request $request)
    {
        $incident = Incident::find($request->id);
        $incident->delete();

        // return view('incidents.detail', compact('incident'));
        return redirect()->route('home');
    }


    public function ajax_index($id)
    {
        $incident = Incident::find($id);
        $threads = $incident->threads;

        return response()->json($threads);

    }

    // #インシデント：検索
    public function search(Request $request){


        $request->validate([
            'title' => ['max:25'],
        ],[
            'title.max' => '検索ワードは、25文字までです。',
        ]);

        $query = Incident::query();
        $search1 = $request->input('title');

        if($search1==null){
            return redirect()->back()->with('flash_message', "検索条件を選択して下さい。");
        }

         // タイトル入力フォームで入力した文字列を含むカラムを取得します
        if ($search1!=null) {
            $query->where('title', 'like', '%'.$search1.'%');
        }

        //#インシデント：ページネーション
        $incidents = $query->paginate(2);
        // $incidents = Incident::select()->latest()->paginate(5);
        $incident = new Incident();

        return view('home', compact('incidents','incident'));
    }

}
