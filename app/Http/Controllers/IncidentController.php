<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Incident;
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

        return view('incidents.detail', compact('incident'));
    }

    public function new()
    {
        return view('incidents.new');
    }

    public function store(Request $request)
    {   
        // dd("ルートチェック");
        
        $incident = new Incident();
        $incident->title = $request->title;
        $incident->body = $request->body;
        $incident->status_id = 0;
        $incident->save();

        // return view('incidents.detail', compact('incident'));
        return redirect()->route('incidents.detail', ['id' => $incident->id]);
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
            'path' => $image_path,
            'message' => 'ok',
            'images' => $images,
        ], 200, [], JSON_UNESCAPED_UNICODE);
    }


    public function destroy(Request $request)
    {   
        $incident = Incident::find($request->id);
        $incident->delete();

        // return view('incidents.detail', compact('incident'));
        return redirect()->route('incidents.index');
    }





}
