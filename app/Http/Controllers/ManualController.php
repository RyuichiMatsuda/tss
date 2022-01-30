<?php

namespace App\Http\Controllers;

use App\Models\Manual;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ManualController extends Controller
{

    public function index()
    {
        $manuals = Incident::select()->latest()->paginate(12);

        return view('manuals.index', compact('manuals'));
    }

    public function detail($id)
    {
        $manual = Incident::find($id);

        return view('manuals.detail', compact('manual'));
    }

    public function new()
    {
        return view('manuals.new');
    }

    public function store(Request $request)
    {   
        // dd("ルートチェック");
        
        $manual = new Incident();
        $manual->name = $request->name;
        $manual->body = $request->body;
        $manual->status_id = 0;
        $manual->save();

        // return view('incidents.detail', compact('incident'));
        return redirect()->route('manuals.detail', ['id' => $incident->id]);
    }
}
