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
        $incident = new Incident();
        // $incident-> = $request->;
        $incident->save();

        return view('incidents.detail', compact('incident'));
    }







}
